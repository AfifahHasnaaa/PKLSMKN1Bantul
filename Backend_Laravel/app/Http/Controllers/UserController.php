<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Periksa Kembali Username dan Password Anda!',
        ]);
    }
    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function faq()
    {
        return view('admin.faq');
    }

    public function contact()
    {
        return view('admin.contact');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('landingPage');
    }

}
