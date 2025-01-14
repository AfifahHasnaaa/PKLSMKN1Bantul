<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('user.nilai.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nilai_presentasi' => 'required',
            'nilai_laporan' => 'required',
        ]);

        // Simpan data ke database
        Nilai::create([
            'id_siswa' => $id,
            'nilai_presentasi' => $request->nilai_presentasi,
            'nilai_laporan' => $request->nilai_laporan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('laporan', $id)->with('success', 'Data nilai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
