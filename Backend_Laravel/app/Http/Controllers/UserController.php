<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function profileAkun(Request $request,$id){
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // Dapatkan user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Simpan perubahan
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return back()->with('success', 'Profile updated successfully.');

    }

    public function profilePassword(Request $request,$id){
        // Validasi input
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required',
        ]);

        // Dapatkan user yang sedang login
        $user = User::find($id);

        // Periksa apakah password saat ini sesuai
        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->route('profile.password', ['id' => $id])
                ->withErrors(['password' => 'Current password is incorrect.']);
        }

        // Update password pengguna
        $user->password = Hash::make($request->input('newpassword'));
        $user->save();

        // Redirect dengan pesan sukses
        return back()->with('success', 'Password updated successfully.');
    }

}
