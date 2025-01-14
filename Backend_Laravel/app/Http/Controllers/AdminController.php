<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function listSiswa()
    {
        return view('admin.user.listSiswa');
    }

    public function listGuru()
    {
        return view('admin.user.listGuru');
    }

    public function listPembimbingInstansi()
    {
        return view('admin.user.listPembimbingInstansi');
    }

    public function tambahUser()
    {
        $jurusans = Jurusan::all();
        $instansis = Instansi::all();
        return view('admin.user.tambahUser', compact('jurusans','instansis'));
    }

    public function listRole()
    {
        return view('admin.role.role');
    }

    public function store(Request $request)
    {
        // Validasi input berdasarkan role
        $validatedData = $request->validate([
            'role' => 'required',
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'kelas' => 'nullable',
            'jurusan_id' => 'nullable',
            'nisn' => 'nullable',
            'nip' => 'nullable',
            'instansi_name' => 'nullable',
            'instansi_address' => 'nullable',
            'instansi_contact' => 'nullable',
            'foto_profile' => 'nullable',
        ]);

        // Upload foto profil jika ada
        if ($request->hasFile('foto_profile')) {
            $fotoFile = $request->file('foto_profile');
            $fileName = time() . '_' . $fotoFile->getClientOriginalName(); // Nama unik untuk file
            $destinationPath = public_path('assets/img/foto_profile'); // Lokasi penyimpanan
            $fotoFile->move($destinationPath, $fileName); // Pindahkan file ke lokasi
            $fotoProfilePath = $fileName; // Simpan path relatif ke database
        }

        // Tambahkan data spesifik sesuai role
        $userData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
            'foto_profile' => $fotoProfilePath ?? 'profile-img.jpg',
        ];

        if ($validatedData['role'] === 'siswa') {
            $userData['kelas'] = $validatedData['kelas'];
            $userData['jurusan_id'] = $validatedData['jurusan_id'];
            $userData['nisn'] = $validatedData['nisn'];
        } elseif ($validatedData['role'] === 'guru') {
            $userData['nip'] = $validatedData['nip'];
        } elseif ($validatedData['role'] === 'instansi') {
            $userData['instansi_name'] = $validatedData['instansi_name'];
            $userData['instansi_address'] = $validatedData['instansi_address'];
            $userData['instansi_contact'] = $validatedData['instansi_contact'];
        }

        // Simpan data ke database
        $user = User::create($userData);

        // Menambahkan role menggunakan Spatie
        $user->assignRole($validatedData['role']);

        // Redirect dengan pesan sukses
        return back()->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data berdasarkan role
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'foto_profile' => 'nullable',
        ];

        if ($user->role === 'siswa') {
            $rules['nisn'] = 'required';
            $rules['kelas'] = 'required';
            $rules['jurusan_id'] = 'required';
        } elseif ($user->role === 'guru') {
            $rules['nip'] = 'required';
        } elseif ($user->role === 'instansi') {
            $rules['instansi_name'] = 'required';
            $rules['instansi_address'] = 'required';
            $rules['instansi_contact'] = 'required';
        }

        $request->validate($rules);

        // Update data umum
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');

        // Update data berdasarkan role
        if ($user->role === 'siswa') {
            $user->nisn = $request->input('nisn');
            $user->kelas = $request->input('kelas');
            $user->jurusan_id = $request->input('jurusan_id');
        } elseif ($user->role === 'guru') {
            $user->nip = $request->input('nip');
        } elseif ($user->role === 'instansi') {
            $user->instansi_name = $request->input('instansi_name');
            $user->instansi_address = $request->input('instansi_address');
            $user->instansi_contact = $request->input('instansi_contact');
        }

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Update foto profil jika ada file yang diunggah
        if ($request->hasFile('foto_profile')) {
            // Hapus foto profil lama jika ada
            if ($user->foto_profile && file_exists(public_path('assets/img/foto_profile/' . $user->foto_profile))) {
                unlink(public_path('assets/img/foto_profile/' . $user->foto_profile));
            }

            // Simpan foto profil baru
            $file = $request->file('foto_profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/foto_profile'), $filename);

            // Simpan nama file ke database
            $user->foto_profile = $filename;
        }

        // Simpan data
        $user->save();

        // Redirect dengan pesan sukses
        return back()->with('success', 'User berhasil diperbarui.');
    }

    public function dataSiswa(Request $request)
    {
        if ($request->ajax()) {
            // Eager load relasi jurusan
            $users = User::with('jurusan', 'instansi')
                ->select(['id', 'name', 'username', 'nisn', 'kelas', 'jurusan_id', 'tempat_pkl', 'role'])
                ->where('role', 'siswa');

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('jurusan', function ($row) {
                    // Ambil nama jurusan melalui relasi
                    return $row->jurusan ? $row->jurusan->nama_jurusan : '-';
                })
                ->addColumn('pkl', function ($row) {
                    // Ambil nama instansi melalui relasi tempatPkl -> instansi
                    return $row->tempat_pkl ? $row->tempatPkl->instansi_name : 'Tidak Ada';
                })
                ->addColumn('opsi', function ($row) {
                    return '
                        <a href="/users/edit/' .
                        $row->id .
                        '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <form action="' .
                        route('users.destroy', $row->id) .
                        '" method="POST" style="display: inline;" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus user ini?\')">
                            ' .
                        csrf_field() .
                        '
                            ' .
                        method_field('DELETE') .
                        '
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>';
                })
                ->rawColumns(['opsi'])
                ->make(true);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $jurusans = Jurusan::all(); // Ambil semua data jurusan
        return view('admin.user.editUser', compact('user', 'jurusans'));
    }

    public function dataGuru(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'username', 'nip', 'role'])->where('role', 'guru');

            return DataTables::of($users)
                ->addIndexColumn()

                ->addColumn('opsi', function ($row) {
                    return '
                        <a href="/users/edit/' .
                        $row->id .
                        '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <form action="' .
                        route('users.destroy', $row->id) .
                        '" method="POST" style="display: inline;" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus user ini?\')">
                            ' .
                        csrf_field() .
                        '
                            ' .
                        method_field('DELETE') .
                        '
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>';
                })
                ->rawColumns(['opsi'])
                ->make(true);
        }
    }

    public function dataInstansi(Request $request)
    {
        if ($request->ajax()) {
            $users = User::with('instansi')
                ->select(['id', 'name', 'username', 'instansi_id', 'role'])
                ->where('role', 'instansi');
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('instansi', function ($row) {
                    // Ambil nama jurusan melalui relasi
                    return $row->instansi ? $row->instansi->instansi_name : '-';
                })
                ->addColumn('opsi', function ($row) {
                    return '
                        <a href="/users/edit/' .
                        $row->id .
                        '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <form action="' .
                        route('users.destroy', $row->id) .
                        '" method="POST" style="display: inline;" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus user ini?\')">
                            ' .
                        csrf_field() .
                        '
                            ' .
                        method_field('DELETE') .
                        '
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>';
                })
                ->rawColumns(['opsi'])
                ->make(true);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus file foto profil jika ada
        if ($user->foto_profile) {
            $filePath = public_path('assets/img/foto_profile/' . $user->foto_profile);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Hapus data user
        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
