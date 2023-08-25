<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tamu;
use App\Models\User;
use App\Models\Warga;
use App\Models\Keluarga;

use App\Models\Kendaraan;

use App\Models\Meninggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;


            if ($usertype == 'user') {
                return view('user.dashboard');
            } else if ($usertype == 'admin') {
                $totalWarga = Warga::count();
                $jumlahLakiLaki = Warga::where('jenis_kelamin', 'Laki Laki')->count();
                $jumlahPerempuan = Warga::where('jenis_kelamin', 'Perempuan')->count();
                $totalKeluarga = Keluarga::count();
                $totalKendaraan = Kendaraan::count();
                $totalTamu = Tamu::count();
                $totalMeninggal = Meninggal::count();

                $ages = Warga::pluck('usia')->toArray(); // Ubah data usia menjadi array


                // dd($ages);

                return view('admin.dashboard.dashboardAdmin', compact(
                    'totalWarga',
                    'totalKeluarga',
                    'totalKendaraan',
                    'totalTamu',
                    'totalMeninggal',
                    'jumlahLakiLaki',
                    'jumlahPerempuan',
                    'ages'
                ));
            } else {
                return redirect()->back();
            }
        }
    }
}
