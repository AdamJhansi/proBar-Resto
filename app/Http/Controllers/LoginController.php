<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    // public function auth(Request $request){
    //     $credentials = $request->validate([
    //         'name' => ['required'],
    //         'password' => ['required'],
    //     ]);
 
    //     if (Auth::attempt($credentials)) {
    //         $request->user()->regenerate();
 
    //         return redirect()->intended('home'); // ini yg dibuat riyan
    //     }
 
    //     return back()->withErrors([
    //         'name' => 'akun tidak sesuai.',
    //     ])->onlyInput('name');
    // }
}
