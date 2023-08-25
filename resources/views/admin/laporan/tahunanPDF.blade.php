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
            width: 100px; /* Ukuran logo kepala surat */
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
            font-size: 18pt; /* Ubah ukuran font menjadi 18pt */
        }
        h2 {
            font-size: 12pt; /* Ubah ukuran font menjadi 18pt */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
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
            <div class="header-subtitle">{{ ($tanggalTahunan) }}</div>
        </div>

        <div class="mb-4">
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
        </div>

        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    </div>
</body>

</html>
