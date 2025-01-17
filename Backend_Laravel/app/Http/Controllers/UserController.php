<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UserController extends Controller
{
    public function index()
    {
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
        $siswa = User::where('role', 'siswa')->count();
        $guru = User::where('role', 'guru')->count();
        $instansi = User::where('role', 'instansi')->count();
        return view('dashboard', compact('siswa', 'guru', 'instansi'));
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

    public function profileAkun(Request $request, $id)
    {
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

    public function profilePassword(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required',
        ]);

        // Dapatkan user yang sedang login
        $user = User::find($id);

        // Periksa apakah password saat ini sesuai
        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()
                ->route('profile.password', ['id' => $id])
                ->withErrors(['password' => 'Current password is incorrect.']);
        }

        // Update password pengguna
        $user->password = Hash::make($request->input('newpassword'));
        $user->save();

        // Redirect dengan pesan sukses
        return back()->with('success', 'Password updated successfully.');
    }

    public function getChartData()
    {
        $data = User::select([DB::raw('YEAR(created_at) as year'), DB::raw("SUM(CASE WHEN role = 'siswa' THEN 1 ELSE 0 END) as siswa"), DB::raw("SUM(CASE WHEN role = 'guru' THEN 1 ELSE 0 END) as guru"), DB::raw("SUM(CASE WHEN role = 'instansi' THEN 1 ELSE 0 END) as instansi")])
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->orderBy('year')
            ->get();

        return response()->json($data);
    }

    public function importUsers(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        $file = $request->file('file');
        // Import file
        Excel::import(new UsersImport, $file);

        return back()->with('success', 'Data users berhasil diimpor.');
    }
}
