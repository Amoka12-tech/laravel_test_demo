<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    //Show admin registration form
    public function show() {
        return view('auth.register');
    }

    /**
     * Handle account creation for admin
     */

     public function create(Request $request) {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'cpassword' => 'required|same:password',
            'role' => 'string'
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withInput($request->only('name', 'email', 'username', 'phone'))->with(['errors' => $validator->errors()]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'username' => $request->username,
            'phone' => $request->phone,
            'role' => Str::contains($request->url(), 'dashboard') ? 'user' : 'admin',
        ]);

        // dd($request);

        return redirect('/')->with('success', "Account successfully registered.");
     }

     /**
      * Show Admin login form
      */
      public function show_login() {
        return view('auth.login');
      }


    /**
     * Handle Admin Login
     */

    public function login_auth(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $auth = Auth::guard('web')->attempt($credentials);
        $user = Auth::user();

        if ($auth && $user->role == 'admin') {
            return redirect()->intended(route('dashboard.show'));
        }

        // dd(trans('auth.failed'));

        return redirect()->back()->withInput($request->only('email'))->withErrors(trans('auth.failed'));
    }

    public function api_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation Error'], 401);
        };


        $credentials = $request->only(['username', 'password']);
        // return response()->json($credentials);

        if (!Auth::guard()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    public function api_logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response(['message' => 'Successfully logged out']);
    }
     
}
