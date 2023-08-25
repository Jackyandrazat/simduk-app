<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Tamu;
use App\Models\Warga;
use App\Models\Keluarga;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Models\Kendaraan;
use App\Models\Meninggal;
use Illuminate\Http\Request;


class LaporanConntroller extends Controller
{
    public function index()
    {
        return view('admin.laporan.laporan');
    }

    public function laporanBulanan(Request $request)
    {
        $tanggalBulanan = $request->input('tanggalBulanan', Carbon::now()->format('Y-m'));
        $firstDayOfMonth = Carbon::parse($tanggalBulanan)->startOfMonth();
        $lastDayOfMonth = Carbon::parse($tanggalBulanan)->endOfMonth();


        // $totalWargaBulanan = Warga::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        // $jumlahLakiLakiBulanan = Warga::where('jenis_kelamin', 'Laki Laki')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        // $jumlahPerempuanBulanan = Warga::where('jenis_kelamin', 'Perempuan')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        // $jumlahStatusPendudukAktifBulanan = Warga::where('status_kependudukan', 'Lama')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        // $jumlahStatusPendudukPindahBulanan = Warga::where('status_kependudukan', 'Baru')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        // //Keluarga
        // $totalKeluargaBulanan = Keluarga::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        // $rataRataAnggotaKeluargaBulanan = Warga::count() / max(1, $totalKeluargaBulanan); // Menghindari pembagian dengan 0

        // //Kematian
        // $totalMeninggalBulanan = Meninggal::whereBetween('date_meninggal', [$firstDayOfMonth, $lastDayOfMonth])->count();

        // //tamu
        // $totalTamuBulanan = Tamu::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
        // //kendaraan
        // $totalKendaraanBulanan = Kendaraan::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();



        return view('admin.laporan.bulanan', compact(
            'tanggalBulanan',
        ));
    }


    public function generatePdf(Request $request)
    {
        $tanggalBulanan = $request->input('tanggalBulanan', Carbon::now()->format('Y-m'));
        $firstDayOfMonth = Carbon::parse($tanggalBulanan)->startOfMonth();
        $lastDayOfMonth = Carbon::parse($tanggalBulanan)->endOfMonth();

        $data = [
            'totalWargaBulanan' => Warga::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'jumlahLakiLakiBulanan' => Warga::where('jenis_kelamin', 'Laki Laki')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'jumlahPerempuanBulanan' => Warga::where('jenis_kelamin', 'Perempuan')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'jumlahStatusPendudukAktifBulanan' => Warga::where('status_kependudukan', 'Lama')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'jumlahStatusPendudukPindahBulanan' => Warga::where('status_kependudukan', 'Baru')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'tanggalBulanan' => $tanggalBulanan,
            'totalKendaraanBulanan' => Kendaraan::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'totalTamuBulanan' => Tamu::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'totalMeninggalBulanan' => Meninggal::whereBetween('date_meninggal', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'totalKeluargaBulanan' => Keluarga::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),

            // ... tambahkan data lainnya
        ];

        $pdf = FacadePdf::loadView('admin.laporan.bulananPDF', $data);

        return $pdf->stream('laporan_bulanan.pdf');
    }



    public function laporanTahunan(Request $request)
    {
        $tanggalTahunan = $request->input('tanggalTahunan', now()->format('Y')); // Ambil input tahun atau gunakan tahun saat ini




        return view('admin.laporan.tahunan', compact('tanggalTahunan'));
    }

    public function generatePdfTahunan(Request $request)
    {
        $tanggalTahunan = $request->input('tanggalTahunan', now()->year);

        $data = [
            'totalWargaTahunan' => Warga::whereYear('created_at', $tanggalTahunan )->count(),
            'jumlahLakiLakiTahunan' => Warga::where('jenis_kelamin', 'Laki Laki')->whereYear('created_at', $tanggalTahunan )->count(),
            'jumlahPerempuanTahunan' => Warga::where('jenis_kelamin', 'Perempuan')->whereYear('created_at',$tanggalTahunan )->count(),
            'jumlahStatusPendudukAktifTahunan' => Warga::where('status_kependudukan', 'Lama')->whereYear('created_at',$tanggalTahunan )->count(),
            'jumlahStatusPendudukPindahTahunan' => Warga::where('status_kependudukan', 'Baru')->whereYear('created_at', $tanggalTahunan )->count(),
            'tanggalTahunan' => $tanggalTahunan,
            'totalKendaraanTahunan' => Kendaraan::whereYear('created_at', $tanggalTahunan )->count(),
            'totalTamuTahunan' => Tamu::whereYear('created_at', $tanggalTahunan )->count(),
            'totalMeninggalTahunan' => Meninggal::whereYear('date_meninggal', $tanggalTahunan )->count(),
            'totalKeluargaTahunan' => Keluarga::whereYear('created_at', $tanggalTahunan )->count(),

            // ... tambahkan data lainnya
        ];

        $pdf = FacadePdf::loadView('admin.laporan.tahunanPDF', $data);

        return $pdf->stream('laporan_tahunan.pdf');
    }
}
