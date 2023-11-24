<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Tamu;
use App\Models\Warga;
use App\Models\Keluarga;
use App\Models\Kendaraan;
use App\Models\Meninggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;


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

        // Menghitung bulan sebelumnya
        $tanggalAwalBulanSebelumnya = Carbon::parse($tanggalBulanan)->subMonth(12)->startOfMonth();
        $tanggalAkhirBulanSebelumnya = Carbon::parse($tanggalBulanan)->subMonth()->endOfMonth();

        // Warga bulan sebelumnya
        $jumlahLakiLakiBulanSebelumnya = Warga::where('jenis_kelamin', 'Laki-laki')
            ->whereBetween('created_at', [$tanggalAwalBulanSebelumnya, $tanggalAkhirBulanSebelumnya])
            ->count();

        $jumlahPerempuanBulanSebelumnya = Warga::where('jenis_kelamin', 'Perempuan')
            ->whereBetween('created_at', [$tanggalAwalBulanSebelumnya, $tanggalAkhirBulanSebelumnya])
            ->count();

        $totalWargaBulanSebelumnya = $jumlahLakiLakiBulanSebelumnya + $jumlahPerempuanBulanSebelumnya;

        //Warga
        $jumlahLakiLakiBulanan = Warga::where('jenis_kelamin', 'Laki-laki')
            ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
            ->count();

        $jumlahPerempuanBulanan = Warga::where('jenis_kelamin', 'Perempuan')
            ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
            ->count();

        $totalWargaBulanan = $jumlahLakiLakiBulanan + $jumlahPerempuanBulanan;

        //warga akhir bulan ini
        $jumlahLakiLakiAkhirBulan = $jumlahLakiLakiBulanSebelumnya + $jumlahLakiLakiBulanan;
        $jumlahPerempuanAkhirBulanan = $jumlahPerempuanBulanSebelumnya + $jumlahPerempuanBulanan;
        $totalWargaAkhirBulan = $jumlahLakiLakiAkhirBulan + $jumlahPerempuanAkhirBulanan;

        //Meninggal 
        $jumlahLakiLakiMeninggalBulan = DB::table('wargas')
            ->join('meninggals', 'wargas.id', '=', 'meninggals.nik')
            ->where('wargas.jenis_kelamin', 'Laki-laki')
            ->whereBetween('date_meninggal', [$firstDayOfMonth, $lastDayOfMonth])
            ->count();
        $jumlahPerempuanMeninggalBulan = DB::table('wargas')
            ->join('meninggals', 'wargas.id', '=', 'meninggals.nik')
            ->where('wargas.jenis_kelamin', 'Perempuan')
            ->whereBetween('date_meninggal', [$firstDayOfMonth, $lastDayOfMonth])
            ->count();
        $totalMeninggalBulanIni = Meninggal::whereBetween('date_meninggal', [$firstDayOfMonth, $lastDayOfMonth])->count();

        //kalkulasi
        $totalBulanIni = $totalWargaBulanan + $totalWargaBulanSebelumnya - $totalMeninggalBulanIni;


        $data = [
            'totalWargaBulanan' => $totalWargaBulanan,
            'jumlahLakiLakiBulanan' => $jumlahLakiLakiBulanan,
            'jumlahPerempuanBulanan' => $jumlahPerempuanBulanan,
            'jumlahStatusPendudukAktifBulanan' => Warga::where('status_kependudukan', 'Lama')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'jumlahStatusPendudukPindahBulanan' => Warga::where('status_kependudukan', 'Pindahan')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'tanggalBulanan' => $tanggalBulanan,
            'totalKendaraanBulanan' => Kendaraan::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'totalTamuBulanan' => Tamu::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'totalKeluargaBulanan' => Keluarga::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count(),
            'pindahWarga' => Warga::where('status_kependudukan', 'Pindah')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get(),
            'wargaMeninggal' => Meninggal::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get(),
            'jumlahLakiLakiMeninggalBulan' => $jumlahLakiLakiMeninggalBulan,
            'jumlahPerempuanMeninggalBulan' => $jumlahPerempuanMeninggalBulan,
            'totalMeninggalBulanIni' => $totalMeninggalBulanIni,
            'totalBulanIni' => $totalBulanIni,
            'jumlahLakiLakiBulanSebelumnya' => $jumlahLakiLakiBulanSebelumnya,
            'jumlahPerempuanBulanSebelumnya' => $jumlahPerempuanBulanSebelumnya,
            'totalWargaBulanSebelumnya' => $totalWargaBulanSebelumnya,
            'jumlahLakiLakiAkhirBulan' => $jumlahLakiLakiAkhirBulan,
            'jumlahPerempuanAkhirBulanan' => $jumlahPerempuanAkhirBulanan,
            'totalWargaAkhirBulan' => $totalWargaAkhirBulan

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

        //Warga
        $jumlahLakiLakiTahunan = Warga::where('jenis_kelamin', 'Laki-laki')->whereYear('created_at', $tanggalTahunan)->count();
        $jumlahPerempuanTahunan = Warga::where('jenis_kelamin', 'Perempuan')->whereYear('created_at', $tanggalTahunan)->count();
        $totalWargaTahunan = $jumlahLakiLakiTahunan + $jumlahPerempuanTahunan;

        //Meninggal 
        $jumlahLakiLakiMeninggalTahun = DB::table('wargas')
            ->join('meninggals', 'wargas.id', '=', 'meninggals.nik')
            ->where('wargas.jenis_kelamin', 'Laki-laki')
            ->whereYear('date_meninggal', $tanggalTahunan)
            ->count();
        $jumlahPerempuanMeninggalTahun = DB::table('wargas')
            ->join('meninggals', 'wargas.id', '=', 'meninggals.nik')
            ->where('wargas.jenis_kelamin', 'Perempuan')
            ->whereYear('date_meninggal', $tanggalTahunan)
            ->count();
        $totalMeninggalTahunIni = Meninggal::whereYear('date_meninggal', $tanggalTahunan)->count();

        //Kalkulasi
        $totalTahunIni = $totalWargaTahunan - $totalMeninggalTahunIni;

        $data = [
            'totalWargaTahunan' => $totalWargaTahunan,
            'jumlahLakiLakiTahunan' => $jumlahLakiLakiTahunan,
            'jumlahPerempuanTahunan' => $jumlahPerempuanTahunan,
            'tanggalTahunan' => $tanggalTahunan,
            'totalMeninggalTahunan' => $totalMeninggalTahunIni,
            'jumlahLakiLakiMeninggalTahun' => $jumlahLakiLakiMeninggalTahun,
            'jumlahPerempuanMeninggalTahun' => $jumlahPerempuanMeninggalTahun,
            'totalTahunIni' => $totalTahunIni,
            'totalKendaraanTahunan' => Kendaraan::whereYear('created_at', $tanggalTahunan)->count(),
            'totalTamuTahunan' => Tamu::whereYear('created_at', $tanggalTahunan)->count(),
            'totalKeluargaTahunan' => Keluarga::whereYear('created_at', $tanggalTahunan)->count(),
        ];

        $pdf = FacadePdf::loadView('admin.laporan.tahunanPDF', $data);

        return $pdf->stream('laporan_tahunan.pdf');
    }
}
