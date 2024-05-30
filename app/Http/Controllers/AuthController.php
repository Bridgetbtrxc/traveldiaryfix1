<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Get the login credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to intended destination or a default location
            $userId = Auth::id();
            return redirect()->route('loginsuccessful', ['id' => $userId]);
        }

        // Authentication failed, redirect back with input
        return redirect('/');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
