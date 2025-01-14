<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Jurnal;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function jurnal()
    {
        return view('user.jurnal.index');
    }

    public function laporan($id)
    {
        $jurnal = Jurnal::where('id_siswa', $id)->first();
        $dataNilai = Nilai::where('id_siswa', $id)->first();
        $nilaiPresentasi = $dataNilai->nilai_presentasi ?? 'Belum Ada';
        $nilaiLaporan = $dataNilai->nilai_laporan ?? 'Belum Ada';
        $allIndikator = Indikator::where('id_jurnal', $jurnal->id)->get() ?? 'Belum Ada';
        $nilaiJurnal = 0;
        if ($allIndikator == 'Belum Ada') {
            $nilaiJurnal = 'Belum Ada';
        } else {
            foreach ($allIndikator as $indikator) {
                $nilaiJurnal += $indikator->skor;
            }
            $nilaiJurnal = $nilaiJurnal / count($allIndikator);
        }
        
        if ($nilaiJurnal == 'Belum Ada' || $nilaiPresentasi == 'Belum Ada' || $nilaiLaporan == 'Belum Ada') {
            $nilaiAkhir = 'Lengkapi';
        } else {
            $nilaiAkhir = ($nilaiJurnal + $nilaiPresentasi + $nilaiLaporan) / 3;
            $nilaiAkhir = round($nilaiAkhir, 1);
        }

        return view('user.laporan.index', compact('jurnal', 'nilaiJurnal', 'nilaiPresentasi', 'nilaiLaporan', 'nilaiAkhir'));
    }
}
