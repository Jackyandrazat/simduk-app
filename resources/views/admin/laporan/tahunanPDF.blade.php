<!DOCTYPE html>
<html>

<head>
    <title>Laporan Tahunan Kependudukan - PDF</title>
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
            padding: 8px;
            text-align: center;
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
            <div class="header-title">Laporan Tahunan Kependudukan</div>
            <div class="header-subtitle">Tahun {{ ($tanggalTahunan) }}</div>
        </div>
        <hr class="border border-dark">
        <div class="mb-4">
            <h2>Data Penduduk Tahun ini</h2>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-center" rowspan="2" style="width: 10%; vertical-align: middle;">No</th>
                        <th class="text-center" rowspan="2"style="vertical-align: middle;">Perincian</th>
                        <th class="text-center" colspan="3">Jumlah</th>
                    </tr>
                    <tr>
                        <th class="">Laki Laki</th>
                        <th class="">Perempuan</th>
                        <th class="">L + P</th>

                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Penambahan Penduduk Tahun Ini</td>
                        <td>{{ $jumlahLakiLakiTahunan }}</td>
                        <td>{{ $jumlahPerempuanTahunan }}</td>
                        <td>{{ $totalWargaTahunan }}</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Kematian Penduduk Tahun Ini</td>
                        <td>{{ $jumlahLakiLakiMeninggalTahun }}</td>
                        <td>{{ $jumlahPerempuanMeninggalTahun }}</td>
                        <td>{{ $totalMeninggalTahunan }}</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-left" colspan="2"></th>
                        <th class="text-center" colspan="3">Jumlah : {{ $totalTahunIni }} </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <hr class="border border-dark">
        <div class="mb-4">
            <h2>Data Keluarga Tahun ini</h2>
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
                        <td>Kartu Keluarga Terdaftar</td>
                        <td>{{ $totalKeluargaTahunan }}</td>
    
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="border border-dark">
        <div class="mb-4">
            <h2>Data Kendaraan Tahun ini</h2>
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
                        <td>Kendaraan Terdaftar</td>
                        <td>{{ $totalKendaraanTahunan }}</td>
    
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="border border-dark">
        <div class="mb-4">
            <h2>Data Tamu Tahun ini</h2>
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
                        <td>Tamu Terdaftar </td>
                        <td>{{ $totalTamuTahunan }}</td>
    
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- <div class="mb-4">
            <h2>Data Jumlah Penduduk</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>Jumlah Penduduk</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laki-Laki</td>
                        <td>{{ $jumlahLakiLakiTahunan }}</td>
                    </tr>
                    <tr>
                        <td>Perempuan</td>
                        <td>{{ $jumlahPerempuanTahunan }}</td>
                    </tr>
                    <tr>
                        <td>Total Warga Terdaftar</td>
                        <td>{{ $totalWargaTahunan }}</td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <div class="mb-4">
            <h2>Jumlah Kartu Keluarga tercatat : {{ $totalKeluargaTahunan }}</h2>
        </div>
        <div class="mb-4">
            <h2>Status Kependudukan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Jumlah Penduduk</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Aktif</td>
                        <td>{{ $jumlahStatusPendudukAktifTahunan }}</td>
                    </tr>
                    <tr>
                        <td>Pindah</td>
                        <td>{{ $jumlahStatusPendudukPindahTahunan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-4">
            <h2>Kendaraan Warga Tercatat : {{ $totalKendaraanTahunan }}</h2>
            <h2>Tamu Bulan ini : {{ $totalTamuTahunan }}</h2>
            <h2>Warga Meninggal : {{ $totalMeninggalTahunan }}</h2>
        </div> --}}

        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    </div>
</body>

</html>
