<!DOCTYPE html>
<html>

<head>
    <title>Laporan Bulanan Kependudukan - PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Gaya CSS untuk tampilan laporan PDF */
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-logo {
            width: 100px;
            /* Ukuran logo kepala surat */
            margin-bottom: 10px;
        }

        .header-title {
            font-size: 18pt;
            font-weight: bold;
        }

        .header-subtitle {
            font-size: 14pt;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18pt;
            /* Ubah ukuran font menjadi 18pt */
        }

        h2 {
            font-size: 12pt;
            /* Ubah ukuran font menjadi 18pt */
        }

        h3 {
            font-size: 9pt;
            /* Ubah ukuran font menjadi 18pt */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        th,
        td {
            border: 1px solid #ccc;
            text-align: center;
        }

        .td-header{
            text-align: left;
            border: 0px solid #1d1c1c;
        }

        .table-header{
            width: 50%;
            margin-left:50%; 
            margin-right:auto;
        }


        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    @php
        use Carbon\Carbon;
    @endphp
    <div class="container mt-4">
        <div class="header">
            <img class="header-logo" src="" alt="Logo">
            <div class="header-title">Laporan Bulanan Kependudukan</div>
            <div class="header-subtitle">Bulan {{ Carbon::parse($tanggalBulanan)->format('F Y') }}</div>
        </div>

        <div class="mb-4">
            <table class="table-header">
                <tr>
                    <td class="td-header" style="background-color: #ffffff;">RT</td>
                    <td class="td-header" style="background-color: #ffffff;">2</td>
                </tr>
                <tr>
                    <td class="td-header">RW</td>
                    <td class="td-header">5</td>
                </tr>
            </table>
            <br/>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-center" rowspan="2" style="width: 10%; vertical-align: middle;">No</th>
                        <th class="text-center" rowspan="2" style="width: 40%; vertical-align: middle;">Perincian</th>
                        <th class="text-center" colspan="3" >Jumlah</th>
                    </tr>
                    <tr>
                        <th class=""style="width: 20%;">Laki Laki</th>
                        <th class=""style="width: 20%;">Perempuan</th>
                        <th class=""style="width: 20%;"  >L + P</th>

                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Penduduk Awal Bulan Ini</td>
                        <td>{{ $jumlahLakiLakiBulanSebelumnya }}</td>
                        <td>{{ $jumlahPerempuanBulanSebelumnya }}</td>
                        <td>{{ $totalWargaBulanSebelumnya }}</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Penambahan Penduduk Bulan Ini</td>
                        <td>{{ $jumlahLakiLakiBulanan }}</td>
                        <td>{{ $jumlahPerempuanBulanan }}</td>
                        <td>{{ $totalWargaBulanan }}</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Kematian Penduduk Bulan Ini</td>
                        <td>{{ $jumlahLakiLakiMeninggalBulan }}</td>
                        <td>{{ $jumlahPerempuanMeninggalBulan }}</td>
                        <td>{{ $totalMeninggalBulanIni }}</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Penduduk Akhir Bulan Ini</td>
                        <td>{{ $jumlahLakiLakiAkhirBulan }}</td>
                        <td>{{ $jumlahPerempuanAkhirBulanan }}</td>
                        <td>{{ $totalWargaAkhirBulan }}</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-left" colspan="2"></th>
                        <th class="text-center" colspan="3">Jumlah : {{ $totalBulanIni }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <h2>Deksripsi Rincian:</h2>
        <h2 class="fw-bold">Daftar Warga Meninggal</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="col-1" style="width: 10%;">#</th>
                    <th class="col-2">Nama</th>
                </tr>
            </thead>
            <tbody>
                @if ($wargaMeninggal->isEmpty())
                    <tr>
                        <td colspan="2">Tidak ada data warga meninggal.</td>
                    </tr>
                @else
                    @foreach ($wargaMeninggal as $warga)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $warga->meninggalRelation->nama }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <hr class="border border-dark">
        <div class="mb-4">
            <h2>Data Keluarga Bulan ini</h2>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%; ">No</th>
                        <th class="text-center" style="">Rincian</th>
                        <th class="text-center" style="">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Kartu Keluarga Terdaftar Bulan Ini</td>
                        <td>{{ $totalKeluargaBulanan }}</td>
    
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="border border-dark">
        <div class="mb-4">
            <h2>Data Kendaraan Bulan ini</h2>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%; ">No</th>
                        <th class="text-center" style="">Rincian</th>
                        <th class="text-center" style="">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Kendaraan Terdaftar Bulan Ini</td>
                        <td>{{ $totalKendaraanBulanan }}</td>
    
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="border border-dark">
        <div class="mb-4">
            <h2>Data Tamu Bulan ini</h2>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%; ">No</th>
                        <th class="text-center" style="">Rincian</th>
                        <th class="text-center" style="">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Tamu Terdaftar Bulan Ini</td>
                        <td>{{ $totalTamuBulanan }}</td>
    
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    </div>
</body>

</html>
