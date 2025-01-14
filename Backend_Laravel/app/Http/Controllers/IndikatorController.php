<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Jurnal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $jurnal = Jurnal::find($id);
        $indikator = Indikator::where('id_jurnal', $id)->get();
        $pembimbingInstansi = User::where('instansi_id', $jurnal->id_instansi)->get();
        if ($pembimbingInstansi == '[]') {
            $pembimbingInstansi = 'Belum Ada Pembimbing Instansi';
        }
        return view('user.jurnal.index', compact('indikator', 'jurnal', 'pembimbingInstansi'));
    }

    public function dataIndikator(Request $request, $id)
    {
        $indikators = Indikator::with(['siswa', 'instansi', 'jurnal'])
            ->select('indikators.*')
            ->where('id_jurnal', $id);
        return DataTables::of($indikators)
            ->addColumn('tanggal_submit', function ($row) {
                // Ambil nama jurusan melalui relasi
                return $row->tanggal_submit ? $row->tanggal_submit : 'Belum Diisi Siswa';
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('indikator.edit', $row->id);
                $deleteUrl = route('indikator.destroy', $row->id);
                $skorUrl = route('indikator.skor', $row->id);
                $isiUrl = route('indikator.isi.create', $row->id);
                return '
                    <a href="' .
                    $editUrl .
                    '" class="btn btn-sm btn-primary m-1">Edit</a>
                    <form method="POST" action="' .
                    $deleteUrl .
                    '" style="display:inline;" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus Indikator Jurnal ini?\')">
                        ' .
                    csrf_field() .
                    '
                        ' .
                    method_field('DELETE') .
                    '
                        <button type="submit" class="btn btn-sm btn-danger m-1">Hapus</button>
                    </form>
                    <a href="' .
                    $skorUrl .
                    '" class="btn btn-sm btn-info m-1">Input Nilai</a>
                    <a href="' .
                    $isiUrl .
                    '" class="btn btn-sm btn-primary m-1">Update Jurnal</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $jurnal = Jurnal::find($id);
        return view('user.jurnal.tambahIndikator', compact('jurnal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validasi data yang dikirim
        $request->validate([
            'indikator' => 'required',
        ]);

        $jurnal = Jurnal::find($id);

        // Membuat data indikator baru
        $indikator = new Indikator();
        $indikator->id_siswa = $jurnal->id_siswa;
        $indikator->id_instansi = $jurnal->id_instansi;
        $indikator->id_jurnal = $jurnal->id;
        $indikator->indikator = $request->indikator;
        $indikator->deskripsi = 'Belum diisi Siswa';
        $indikator->status = $request->status;
        $indikator->skor = $request->skor;
        $indikator->tanggal_submit = null;

        // Simpan data indikator ke database
        $indikator->save();

        // Redirect ke halaman tertentu setelah berhasil menyimpan
        return redirect()
            ->route('show.jurnal', ['id' => $id])
            ->with('success', 'Indikator berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Indikator $indikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indikator $indikator, $id)
    {
        $indikator = Indikator::find($id);
        return view('user.jurnal.editIndikator', compact('indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'indikator' => 'required',
        ]);

        $indikator = Indikator::findOrFail($id);
        $indikator->update($validated);

        return redirect()
            ->route('show.jurnal', ['id' => $indikator->id_jurnal])
            ->with('success', 'Indikator berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari indikator berdasarkan ID
        $indikator = Indikator::findOrFail($id);
        $jurnalId = $indikator->id_jurnal;
        // Hapus indikator
        $indikator->delete();

        // Redirect dengan pesan sukses
        return redirect()
            ->route('show.jurnal', ['id' => $jurnalId])
            ->with('success', 'Indikator berhasil dihapus');
    }

    public function skor($id)
    {
        $indikator = Indikator::find($id);
        return view('user.jurnal.skorIndikator', compact('indikator'));
    }

    public function updateSkor(Request $request, $id)
    {
        $validated = $request->validate([
            'skor' => 'required',
        ]);

        $indikator = Indikator::findOrFail($id);
        $indikator->update($validated);

        return redirect()
            ->route('show.jurnal', ['id' => $indikator->id_jurnal])
            ->with('success', 'Skor berhasil diUpdate');
    }

    public function isiCreate($id)
    {
        $indikator = Indikator::find($id);
        return view('user.jurnal.isiIndikator', compact('indikator'));
    }

    public function isiUpdate(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'indikator' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        // Cari data indikator berdasarkan ID
        $indikator = Indikator::findOrFail($id);

        // Update data indikator
        $indikator->indikator = $validated['indikator'];
        $indikator->deskripsi = $validated['deskripsi'];
        $indikator->status = $validated['status'];
        $indikator->tanggal_submit = now();
        $indikator->skor = 0;
        $indikator->save();

        // Redirect dengan pesan sukses
        return redirect()
            ->route('show.jurnal', ['id' => $indikator->id_jurnal])
            ->with('success', 'Indikator berhasil diupdate');
    }
}
