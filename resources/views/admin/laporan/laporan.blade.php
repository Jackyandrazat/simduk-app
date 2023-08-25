@php
    use Carbon\Carbon;
@endphp
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Laporan') }}
        </h2>
        <nav aria-label="Breadcrumb" class="mt-2">
            <ol class="flex items-center gap-1 text-sm text-gray-600">
                <li>
                    <a href="/home" class="block transition hover:text-gray-700">
                        <span class="sr-only"> Home </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <a href="/laporan" class="block transition hover:text-gray-700"> Laporan </a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="max-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full ">
            <h1 class="text-4xl font-extrabold mb-4 text-gray-800">Laporan Pendataan RT.2 RW.5 Komplek Waluyo</h1>
            <p class="text-gray-600 mb-6">Pilih jenis laporan yang ingin Anda lihat:</p>
            <div class="flex justify-between">
                <a href="{{ route('laporan.bulanan') }}"
                   class="w-1/2 py-3 px-6 rounded-lg mr-5 bg-blue-500 text-white font-semibold hover:bg-blue-600 transition duration-300 ease-in-out">
                    Laporan Bulanan
                </a>
                <a href="{{ route('laporan.tahunan') }}"
                   class="w-1/2 py-3 px-6 rounded-lg bg-green-500 text-white font-semibold hover:bg-green-600 transition duration-300 ease-in-out">
                    Laporan Tahunan
                </a>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <h1>Laporan Bulanan</h1>
        <form action="{{ route('laporan.index') }}" method="GET">
            <div class="form-group">
                <label for="tanggal">Pilih Bulan:</label>
                <input type="month" id="tanggal" name="tanggal"
                    value="{{ old('tanggal', Carbon::now()->format('Y-m')) }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </form>
        <hr>
        <h2>Laporan Bulan {{ Carbon::parse($tanggal)->format('F Y') }}</h2>
        <p>Total Warga: {{ $totalWarga }}</p>
        <p>Jumlah Laki-Laki: {{ $jumlahLakiLaki }}</p>
        <p>Jumlah Perempuan: {{ $jumlahPerempuan }}</p>
    </div> --}}

</x-admin-layout>
