<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.listInstansi');
    }

    public function dataInstansi(Request $request){
        if ($request->ajax()) {
            $instansi = Instansi::select(['id', 'instansi_name', 'instansi_address', 'instansi_contact']);
            return DataTables::of($instansi)
                ->addIndexColumn()
                ->addColumn('opsi', function ($row) {
                    return '
                        <a href="/edit-instansi/' .
                        $row->id .
                        '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <form action="' .
                        route('delete.instansi', $row->id) .
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.tambahInstansi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'instansi_name' => 'required',
            'instansi_address' => 'required',
            'instansi_contact' => 'required',
        ]);

        // Simpan data instansi ke dalam database
        Instansi::create([
            'instansi_name' => $validated['instansi_name'],
            'instansi_address' => $validated['instansi_address'],
            'instansi_contact' => $validated['instansi_contact'],
        ]);

        // Redirect atau response setelah data berhasil disimpan
        return back()->with('success', 'Instansi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instansi $instansi,$id)
    {
        // Ambil data instansi berdasarkan ID
        $instansi = Instansi::find($id);

        // Tampilkan form edit instansi
        return view('admin.user.editInstansi', compact('instansi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input form
    $validated = $request->validate([
        'instansi_name' => 'required',
        'instansi_address' => 'required',
        'instansi_contact' => 'required',
    ]);

    // Cari instansi berdasarkan ID
    $instansi = Instansi::findOrFail($id);

    // Update data instansi
    $instansi->update([
        'instansi_name' => $validated['instansi_name'],
        'instansi_address' => $validated['instansi_address'],
        'instansi_contact' => $validated['instansi_contact'],
    ]);

    // Redirect atau response setelah data berhasil diperbarui
    return back()->with('success', 'Instansi berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instansi $instansi,$id)
    {
        // Hapus data instansi berdasarkan ID
        Instansi::destroy($id);

        // Redirect atau response setelah data berhasil dihapus
        return back()->with('success', 'Instansi berhasil dihapus.');
    }
}
