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

    <div class="min-h-screen">
        <div class="bg-white shadow-md p-6 md:p-8 rounded-lg max-w-full my-5">
            <h1 class="text-3xl md:text-4xl font-semibold mb-4 text-gray-800">Laporan Tahunan</h1>
            <form action="{{ route('laporan.tahunanPDF') }}" method="GET">
                <div class="mb-4">
                    <label for="tanggalTahunan" class="block text-gray-600 font-medium">Pilih Tahun:</label>
                    <input type="number" id="tanggalTahunan" name="tanggalTahunan"
                           value="{{ $tanggalTahunan }}" class="form-input mt-1 py-2 px-3 block w-full rounded-md shadow-sm">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    Tampilkan
                </button>
            </form>
        </div>
    </div>

</x-admin-layout>
