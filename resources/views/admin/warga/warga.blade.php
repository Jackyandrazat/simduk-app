<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Warga') }}
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
                    <a href="/warga" class="block transition hover:text-gray-700"> Warga </a>
                </li>
            </ol>
        </nav>
    </x-slot>


    <div>
        <div class="relative ml-7 mb-5">
            <div class="relative inline-block text-left">
                <a href="{{ route('warga.create') }}" class="inline-flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Tambah Data</span>
                </a>
            </div>
            
            <a class="inline-flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                href="{{ route('warga.generatePDF') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>


                <span>View PDF</span>
            </a>
            <a class="inline-flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                href="{{ route('warga.downloadPDF') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>


                <span>Download PDF</span>
            </a>

        </div>
    </div>
    @if (session()->has('success'))
        <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-2 py-3 max-w-5xl mb-5 ml-5"
            role="alert">
            <p class="font-bold">Success message</p>
            <p class="text-sm">{{ session('success') }}</p>
        </div>
    @endif
    @if (session()->has('pesan'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-2 py-3 max-w-5xl mb-5 ml-5"
            role="alert">
            <p class="font-bold">Informational message</p>
            <p class="text-sm">{{ session('pesan') }}</p>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-blue-100 border-t border-b border-red-600 text-red-600 px-2 py-3 max-w-5xl mb-5 ml-5"
            role="alert">
            <p class="font-bold">Error Message</p>
            <p class="text-sm">{{ session('error') }}</p>
        </div>
    @endif
    <div class="max-w-5xl sm:px-6 lg:px-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <!-- With actions -->
                <h4 class="mb-4 text-lg text-center font-semibold text-gray-600 dark:text-gray-300">
                    Table Warga
                </h4>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <div class="flex justify-end pr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8 mt-6 mr-2">
                                <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input type="text" id="customSearchInput" placeholder="Cari Data" class="mt-5">
                        </div>
                        <table class="w-full whitespace-no-wrap" id='tabelWarga'>
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-2 py-2">NIK</th>
                                    <th class="px-2 py-2">Nama Warga</th>
                                    <th class="px-2 py-2">Alamat</th>
                                    <th class="px-2 py-2">Alamat Sekarang</th>
                                    <th class="px-2 py-2">RT</th>
                                    <th class="px-2 py-2">RW</th>
                                    <th class="px-2 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($wargas as $warga)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-2 py-2">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $warga['nik'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-2 text-sm">
                                            {{ $warga['nama'] }}
                                        </td>
                                        <td class="px-2 py-2 text-sm">
                                            {{ $warga['alamat'] }}
                                        </td>
                                        <td class="px-2 py-2 text-sm">
                                            {{ $warga['alamat_baru'] }}
                                        </td>
                                        <td class="px-2 py-2 text-sm">
                                            {{ $warga['RW'] }}
                                        </td>
                                        <td class="px-2 py-2 text-sm">
                                            {{ $warga['RT'] }}
                                        </td>
                                        <td class="px-2 py-2">
                                            <div class="flex items-center space-x-2 text-sm">
                                                <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit"
                                                    href="{{ route('warga.edit', ['warga' => $warga->id]) }}">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit"
                                                    href="{{ route('warga.show', ['warga' => $warga->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('warga.destroy', ['warga' => $warga->id]) }}"
                                                    method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete" type="submit"
                                                        onclick="return confirm('Yakin akan menghapus data ?')">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('windmill') }}/public/assets/js/custom-search.js" defer></script>
    <script>
        // Ambil elemen tombol dan elemen dropdown
        const toggleDropdown = document.getElementById("toggleDropdown");
        const dropdownContent = document.getElementById("dropdownContent");

        // Tambahkan event listener pada tombol untuk mengganti visibilitas dropdown
        toggleDropdown.addEventListener("click", function () {
            if (dropdownContent.classList.contains("hidden")) {
                dropdownContent.classList.remove("hidden");
            } else {
                dropdownContent.classList.add("hidden");
            }
        });
    </script>

</x-admin-layout>
