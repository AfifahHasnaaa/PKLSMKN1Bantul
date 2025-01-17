<?php

namespace App\Exports;

use App\Models\Jurnal;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class JurnalHarianExport implements FromArray, WithEvents
{
    protected $jurnalId;

    public function __construct($jurnalId)
    {
        $this->jurnalId = $jurnalId;
    }

    public function array(): array
    {
        $jurnal = Jurnal::where('id', $this->jurnalId)
            ->with('siswa', 'instansi', 'guru', 'indikator')
            ->first();

        // **Data Jurnal**
        $data = [
            ['Tanggal', $jurnal->created_at->format('Y-m-d')],
            ['Nama Siswa', $jurnal->siswa->name],
            ['Instansi', $jurnal->instansi->instansi_name],
            ['Guru Pembimbing', $jurnal->guru->name],
            ['Posisi Magang', $jurnal->posisi_magang],
            [''], // Baris Kosong
        ];

        // // **Header Indikator**
        // $data[] = ['No', 'Tanggal', 'Tujuan Pembelajaran', 'Deskripsi', 'Status', 'Skor'];

        // // **Data Indikator**
        // $no = 1;
        // foreach ($jurnal->indikator as $indikator) {
        //     $data[] = [
        //         $no,
        //         $indikator->tanggal_submit,
        //         $indikator->indikator,
        //         $indikator->deskripsi,
        //         $indikator->status,
        //         $indikator->skor,
        //     ];
        //     $no++;
        // }

        return $data;
    }

    // public function headings(): array
    // {
    //     return ['Tanggal', 'Nama Siswa', 'Instansi', 'Guru Pembimbing', 'Posisi Magang'];
    // }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Posisi awal untuk indikator (setelah data jurnal)
                $startRow = count($this->array()) + 3;

                // Tambahkan heading indikator
                $event->sheet->setCellValue('A' . $startRow, 'No');
                $event->sheet->setCellValue('B' . $startRow, 'Tanggal');
                $event->sheet->setCellValue('C' . $startRow, 'Tujuan Pembelajaran');
                $event->sheet->setCellValue('D' . $startRow, 'Deskripsi');
                $event->sheet->setCellValue('E' . $startRow, 'Status');
                $event->sheet->setCellValue('F' . $startRow, 'Skor');

                // Styling header indikator (Bold + Background Abu-Abu)
            $headerRange = 'A' . $startRow . ':F' . $startRow;
            $event->sheet->getStyle($headerRange)->applyFromArray([
                'font' => [
                    'bold' => true,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'D3D3D3', // Warna abu-abu
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ]);

                // Ambil data indikator berdasarkan jurnal
                $jurnal = Jurnal::where('id', $this->jurnalId)
                    ->with('indikator')
                    ->first();
                $indikatorData = $jurnal->indikator ?? [];

                $row = $startRow + 1;
                $no = 1; // Nomor urut indikator

                foreach ($indikatorData as $indikator) {
                    $event->sheet->setCellValue('A' . $row, $no);
                    $event->sheet->setCellValue('B' . $row, $indikator->tanggal_submit);
                    $event->sheet->setCellValue('C' . $row, $indikator->indikator);
                    $event->sheet->setCellValue('D' . $row, $indikator->deskripsi);
                    $event->sheet->setCellValue('E' . $row, $indikator->status);
                    $event->sheet->setCellValue('F' . $row, $indikator->skor);

                    $no++;
                    $row++;
                }

                // // **Mengatur Lebar Kolom Secara Manual**
                // foreach (range('A', 'F') as $column) {
                //     $event->sheet->getColumnDimension($column)->setAutoSize(true);
                // }

                // **Menyesuaikan Lebar Khusus untuk Kolom yang Panjang**
                $event->sheet->getColumnDimension('B')->setWidth(20); // Tujuan Pembelajaran
                $event->sheet->getColumnDimension('C')->setWidth(30); // Tujuan Pembelajaran
                $event->sheet->getColumnDimension('D')->setWidth(40); // Deskripsi

                 $event->sheet->getStyle('A' . $startRow . ':F' . ($row - 1))
                ->getAlignment()
                ->setWrapText(true) // Membungkus teks
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP); // Rata atas

                // Menentukan range sel untuk indikator
                $indikatorRange = 'A' . $startRow . ':F' . ($row - 1);

                // Menambahkan border pada indikator
                $event->sheet->getStyle($indikatorRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'], // Warna hitam
                        ],
                    ],
                ]);
            },
        ];
    }
}
