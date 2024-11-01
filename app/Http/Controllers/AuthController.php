<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure this view exists in resources/views/auth/login.blade.php
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the intended location or dashboard
            return redirect()->intended(route('dashboard'));
        }

        // If login fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        // Redirect to the login page
        return redirect()->route('landing')->with('success', 'Successfully logged out.');
    }
}