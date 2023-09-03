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

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        th,
        td {
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
            <div class="header-title">Laporan Bulanan Kependudukan</div>
            <div class="header-subtitle">{{ Carbon::parse($tanggalBulanan)->format('F Y') }}</div>
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
                        <td>{{ $jumlahLakiLakiBulanan }}</td>
                    </tr>
                    <tr>
                        <td>Perempuan</td>
                        <td>{{ $jumlahPerempuanBulanan }}</td>
                    </tr>
                    <tr>
                        <td>Total Warga Terdaftar</td>
                        <td>{{ $totalWargaBulanan }}</td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="mb-4">
            <h2>Jumlah Kartu Keluarga tercatat : {{ $totalKeluargaBulanan }}</h2>
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
                        <td>{{ $jumlahStatusPendudukAktifBulanan }}</td>
                    </tr>
                    <tr>
                        <td>Pindah</td>
                        <td>{{ $jumlahStatusPendudukPindahBulanan }}</td>
                    </tr>
                    <tr>
                        <td>Meninggal</td>
                        <td>{{ $totalMeninggalBulanan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2 class="fw-bold">Daftar Warga Pindah</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="col-1" style="width: 10%;">#</th>
                    <th class="col-2">Nama</th>
                </tr>
            </thead>
            <tbody>
                @if ($pindahWarga->isEmpty())
                    <tr>
                        <td colspan="2">Tidak ada data warga yang pindah.</td>
                    </tr>
                @else
                @foreach ($pindahWarga as $warga)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $warga->nama }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
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

        <div class="mb-4">
            <h2>Kendaraan Warga Tercatat : {{ $totalKendaraanBulanan }}</h2>
            <h2>Tamu Bulan ini : {{ $totalTamuBulanan }}</h2>
        </div>

        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    </div>
</body>

</html>
