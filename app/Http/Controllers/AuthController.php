<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => request()->get('name'),
            'email' => request()->get('email'),
            'password' => Hash::make(request()->get('password')),
        ]);

        return redirect()->route('dashboard.index')->with('success', 'User was registered');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard.index')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('dashboard.index')->withErrors([
            'email' => 'No matching user found using credentials.',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        return redirect()->route('dashboard.index');
    }
}
