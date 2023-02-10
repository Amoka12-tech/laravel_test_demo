<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'email',
            'phone' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }

        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $user->id,
        ];
        //Check if contact not exist then create
        $found_contact_phone = Contact::where('user_id', $user->id)->where('phone', $request->phone)->first();
        $found_contact_email = Contact::where('user_id', $user->id)->where('email', $request->email)->first();

        if(!$found_contact_phone && !$found_contact_email) {
            $contact = Contact::create($data);
            return response()->json(['result' => $contact ], 200);
        };

        return response()->json(['message' => 'Contact already exist'], 405);
    } //Create the contact

    public function show(Request $request)
    {
        $user = $request->user();
        $contact = Contact::where('user_id', $user->id)->get();
        return response()->json(['results' => $contact], 200);
    }

    public function update_user(Request $request) {
        $user = $request->user();
        $user->update($request->all());
        $saved = $user->save();

        if(!$saved) {
            return response()->json(['message' => 'Failed to update User profile'], 501);
        }

        return response()->json(['result' => $request->name, 'message' => 'User profile updated successfuly!'], 200);

    }

    public function update(Request $request, $id)
    {
        $user = $request->user();
        $contact = Contact::where('id', $id)->where('user_id', $user->id)->first();

        if (!$contact) {
            return response()->json(['message' => 'Failed to find contact'], 405);
        }

        $updated = $contact->update($request->all());//Contact details

        return response()->json(['result' => $updated, 'message' => 'Contact updated!'], 200);
    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $contact = Contact::where('id', $id)->where('user_id', $user->id)->first();

        if (!$contact) {
            return response()->json(['message' => 'Failed to find contact'], 405);
        }
        $contact->delete();
        return response()->json(['message' => 'Contact deleted'], 200);
    }

    public function search(Request $request, $field, $query,)
    {
        $user = $request->user();

        //Fiter contact with name, email, or phone number
        $searchTerm = $query;
        $contacts = Contact::where('user_id', $user->id);
        $contacts = $contacts->where(function($query) use ($searchTerm) {
            $query->where('email', $searchTerm)
                ->orWhere('firstname', 'like', "%{$searchTerm}%")
                ->orWhere('lastname', 'like', "%{$searchTerm}%")
                ->orWhere('phone', '=', $searchTerm);
            })->orderBy('created_at', 'desc')
                ->get();
        $count = $contacts->count();

        return response()->json([ 'result' => $contacts, 'count' => $count ], 200);
    }


}
