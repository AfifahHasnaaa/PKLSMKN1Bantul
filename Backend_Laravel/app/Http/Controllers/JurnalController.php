<?php

namespace App\Http\Controllers;

use App\Exports\JurnalHarianExport;
use App\Models\Instansi;
use App\Models\Jurnal;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function semuaSiswa()
    {
        return view('user.pembimbing.semuaSiswa');
    }

    public function dataSemuaSiswa(Request $request)
    {
        if ($request->ajax()) {
            // Eager load relasi jurusan
            $users = User::with('jurusan', 'instansi')
                ->select(['id', 'name', 'username', 'nisn', 'kelas', 'jurusan_id', 'tempat_pkl', 'role'])
                ->where('role', 'siswa');

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('pkl', function ($row) {
                    // Ambil nama instansi melalui relasi tempatPkl -> instansi
                    return $row->tempat_pkl ? $row->tempatPkl->instansi_name : 'Tidak Ada';
                })
                ->addColumn('jurnal', function ($row) {
                    $hasJurnal = Jurnal::where('id_siswa', $row->id)->first();
                    return $hasJurnal ? '<a href="/jurnal-siswa/'.$hasJurnal->id.'" class="btn btn-primary" style="font-size:0.7rem;font-weight: 700;">Lihat Jurnal</a>' : '<a href="#" style="font-size:0.7rem;font-weight: 700;" class="btn btn-danger">Tidak Ada Jurnal</a>';
                })
                ->rawColumns(['jurnal'])
                ->addColumn('opsi', function ($row) {
                    $hasJurnal = Jurnal::where('id_siswa', $row->id)->first();
                    return $hasJurnal
                        ? '
                        <a href="/edit-jurnal/' .
                                $row->id .
                                '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <form action="' .
                                route('delete.jurnal', $row->id) .
                                '" method="POST" style="display: inline;" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus Jurnal dari siswa ini?\')">
                            ' .
                                csrf_field() .
                                '
                            ' .
                                method_field('DELETE') .
                                '
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>'
                        : '<a href="/buat-jurnal/' . $row->id . '" style="font-size:0.7rem;font-weight: 700;" class="btn btn-primary">Buat Jurnal</a>';
                })
                ->addColumn('laporan', function ($row) {
                    // Ambil nama instansi melalui relasi tempatPkl -> instansi
                    return '<a href="/laporan/' . $row->id . '" class="btn btn-warning" style="font-size:0.7rem;font-weight: 700;">Lihat Laporan</a>';
                })
                ->rawColumns(['jurnal', 'opsi','laporan'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $siswa = User::find($id);
        $guru = User::where('role', 'guru')->get();
        $pembimbing = User::where('role', 'instansi')->get();
        $jurnal = Jurnal::where('id_siswa', $id)->first();
        $instansi = Instansi::all();
        return view('user.pembimbing.buatJurnal', compact('siswa', 'guru', 'pembimbing', 'instansi','jurnal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id_siswa' => 'required',
            'id_guru' => 'required',
            'id_instansi' => 'required',
            'durasi_magang' => 'required',
            'posisi_magang' => 'required',
        ]);

        // Simpan data ke database
        Jurnal::create([
            'id_siswa' => $request->id_siswa,
            'id_guru' => $request->id_guru,
            'id_instansi' => $request->id_instansi,
            'durasi_magang' => $request->durasi_magang,
            'posisi_magang' => $request->posisi_magang,
        ]);

        // Redirect dengan pesan sukses
        return back()->with('success', 'Data jurnal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $jurnal,$id)
    {
        $siswa = User::find($id);
        $jurnal = Jurnal::where('id_siswa', $id)->first();
        $guru = User::where('role', 'guru')->get();
        $pembimbing = User::where('role', 'instansi')->get();
        $instansi = Instansi::all();
        return view('user.pembimbing.editJurnal', compact('siswa', 'guru', 'pembimbing', 'instansi','jurnal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_siswa' => 'required',
            'id_guru' => 'required',
            'id_instansi' => 'required',
            'durasi_magang' => 'required|numeric|min:1',
            'posisi_magang' => 'required',
        ]);

        // Cari jurnal berdasarkan ID
        $jurnal = Jurnal::findOrFail($id);

        // Update data jurnal
        $jurnal->id_siswa = $request->id_siswa;
        $jurnal->id_guru = $request->id_guru;
        $jurnal->id_instansi = $request->id_instansi;
        $jurnal->durasi_magang = $request->durasi_magang;
        $jurnal->posisi_magang = $request->posisi_magang;

        // Simpan perubahan ke database
        $jurnal->save();

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Data jurnal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari jurnal berdasarkan ID
        $user = User::find($id);
        $jurnal = Jurnal::where('id_siswa', $id)->first();

        // Hapus jurnal dari database
        $jurnal->delete();

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Data jurnal berhasil dihapus.');
    }

   
    public function exportExcel($id)
    {
        return Excel::download(new JurnalHarianExport($id), 'jurnal-harian.xlsx');
    }
}
