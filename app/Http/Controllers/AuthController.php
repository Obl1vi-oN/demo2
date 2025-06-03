<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView() {
        return view('auth.login');
    }
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'login' => 'required|string|min:6|max:255|unique:users',
            'phone' => 'required|string|min:10|max:17',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'full_name' => $validated['full_name'],
            'login' => $validated['login'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 1,
        ]);

        return redirect()->route('login')->with('success', 'Успешная регистрация');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->with('error', 'Неверные учетные данные');
        }

        Auth::user();

        return redirect('/')->with('success', 'Успешный вход');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
