<?php

namespace App\Http\Controllers;

use App\Mail\AuthLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Store new user
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Mail::to($user->email)->send(new AuthLink($user->email));

        return redirect()->back()->with([
            'success' => 'Your login link has been sent please check you email box.'
        ]);
    }

    /**
     * Display the registration form
     */
    public function registerForm()
    {
        return view('auth.register');
    }


    /**
     * Display the login form
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Send the login link
     */
    public function sendLoginLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        $user = User::whereEmail($request->email)->first();
        if($user) {
            Mail::to($user->email)->send(new AuthLink($user->email));
            return redirect()->back()->with([
                'success' => 'Your login link has been sent please check you email box.'
            ]);
        }else {
            return redirect()->back()->with([
                'error' => 'This credentials do not match any of our records.'
            ]);
        }
    }

    /**
     * Authenticate a user
     */
    public function auth($email)
    {
        $user = User::whereEmail($email)->first();
        if($user) {
            auth()->login($user);
            return redirect()->route('home');
        }else {
            abort(404);
        }
    }

    /**
     * Logout users
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
