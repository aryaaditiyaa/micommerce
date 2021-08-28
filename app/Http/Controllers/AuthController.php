<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Invalid credentials'
            ]);
        }

        if (Auth::user()->role == 'ADMIN') {
            return redirect(route('product.index'));
        }

        return redirect(route('home'));
    }

    public function viewRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        Auth::login(User::create([
            'role' => 'USER',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        return redirect(route('viewLogin'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('viewLogin'));
    }
}
