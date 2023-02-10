<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Show Dashbord view
     */
    public function show(Request $request) {
        $page = $request->get('page');
        // UserFactory::times(50)->create();

        //Get all user except the current logged-in user
        $users = User::where('role', '!=', 'admin');

        //Fiter with name, email, or phone number
        $searchTerm = $request->search;
        $users = $users->where(function($query) use ($searchTerm) {
            $query->where('email', '=', $searchTerm)
                ->orWhere('name', 'like', "%{$searchTerm}%")
                ->orWhere('phone', '=', $searchTerm);
            })->orderBy('created_at', 'desc')
                ->get();
        $count = $users->count();

        return view('admin.index', ['users' => $users->skip($page * 10)->take(10), 'count' => $count])->with(['search' => $searchTerm]);
    }

    /**
     * Logout function
     */
    public function logout() {
        Session::flush();
        Auth::guard('web')->logout();

        return redirect()->route('login.show');
    }
}
