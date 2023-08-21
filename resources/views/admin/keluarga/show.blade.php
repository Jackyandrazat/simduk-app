<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Detail Keluarga') }}
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
                    <a href="/keluarga" class="block transition hover:text-gray-700"> Keluarga </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <a href="{{ route('keluarga.show', ['keluarga' => $keluarga->id]) }}" class="block transition hover:text-gray-700"> Detail Keluarga </a>
                </li>
            </ol>
        </nav>
    </x-slot>
    <div class="relative inline-block text-right py-2">
        <button id="toggleDropdown" type="button" class="float-right flex items-center justify-end px-4 py-2 mr-5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
            </svg>
            <span>Cetak Data</span>
        </button>
        <div id="dropdownContent" class="absolute right-0 top-10 mt-5 mr-5 py-2 w-auto bg-white rounded-lg shadow-xl z-10 hidden">
            <!-- Dropdown content here -->
            {{-- <a href="{{ route('warga.generateWordDoc', [$warga->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Surat Keterangan Domisili</a> --}}
            <!-- Add more dropdown items as needed -->
        </div>
    </div>
    <div class="flow-root container px-6 mb-7">
        <div class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-32 object-cover" src="{{ url('windmill') }}/public/assets/img/bg-keluarga.png" alt="Keluarga">
            <div class="p-4">
                <h1 class="text-xl text-center font-semibold mb-2">Kartu Keluarga</h1>
                <h1 class="text-sm text-center font-semibold mb-2">No : {{ $keluarga->no_kk }}</h1>
                <hr class="mb-4">
                {{-- <div class="flex justify-between">
                    <div>
                        <p class="font-semibold">Nama Ayah</p>
                        
                        <p class="text-gray-600"></p>
                        
                    </div>
                    <div>
                        <p class="font-semibold">Nama Ibu</p>
                        <p class="text-gray-600"></p>
                    </div>
                </div> --}}
                <div class="mt-4">
                    <table class="w-full mt-2 text-center">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="p-2">Nama</th>
                                <th class="p-2">NIK</th>
                                <th class="p-2">Jenis Kelamin</th>
                                <th class="p-2">Tanggal Lahir</th>
                                <th class="p-2">Status</th>
                                <th class="p-2">Status Kartu Keluarga</th>
                                <th class="p-2">Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wargas as $warga)
                            <tr>
                                <td class="p-2 font-semibold">{{$warga->nama}}</td>
                                <td class="p-2 text-gray-600">{{$warga->nik}}</td>
                                <td class="p-2 text-gray-600">{{$warga->jenis_kelamin}}</td>
                                <td class="p-2 text-gray-600">{{$warga->tanggal_lahir}}</td>
                                <td class="p-2 text-gray-600">{{$warga->status}}</td>
                                <td class="p-2 text-gray-600">{{$warga->status_kk}}</td>
                                <td class="p-2 text-gray-600">{{$warga->pekerjaan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right mt-4 mr-4">
                    <p class="font-semibold mt-2">NAMA KELUARGA</p>
                    <p class="font-semibold mt-2">{{ $keluarga->nama_keluarga }}</p>
                    {{-- <p class="text-gray-600">{{ $keluarga->warga->nama }}</p> --}}
                </div>
            </div>
        </div>
    </div>
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
