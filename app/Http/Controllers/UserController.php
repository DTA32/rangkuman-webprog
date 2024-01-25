<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function register(Request $request){
        $rawData = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        User::factory()->create([
            'name' => $rawData['name'],
            'email' => $rawData['email'],
            'password' => bcrypt($rawData['password']),
        ]);
        return redirect()->route('loginPage');
    }

    public function registerPage(){
        return view('register');
    }
}
