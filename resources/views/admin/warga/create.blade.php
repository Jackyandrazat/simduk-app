<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warga page') }}
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

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <a href="{{ route('warga.create') }}" class="block transition hover:text-gray-700"> Tambah Warga
                    </a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div>
        <div class="container px-6 mx-auto grid">
            <div class="px-4 py- mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h4 class="mb-4 text-lg text-center font-semibold text-gray-600 dark:text-gray-300">
                    Tambah Data Warga
                </h4>
                <form action="{{ route('warga.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 mt-3">
                        <label for="file" class="block text-sm font-medium text-gray-700">Upload File with
                            Excel</label>
                        <input type="file" id="file" name="file"
                            class="mt-1 p-2 border rounded-lg w-full border-gray-600">
                    </div>
                    @if ($errors->has('error'))
                            <p id="nik-error" class="mt-2 text-sm text-red-600"> {{ $errors->first('error') }}</p>
                    @endif

                    <div class="mt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">Upload</button>
                    </div>
                </form>
                <hr class="mt-5 border-cool-gray-600">
                <label class="block text-sm font-medium text-gray-700 mt-3">Manual Upload with Form</label>
                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">NIK</span>
                        <input
                            class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('nik') border-red-500 @enderror"
                            value="{{ old('nik') }}" placeholder="Jane Doe" id="nik" name="nik" />
                        <p id="nik-error" class="mt-2 text-sm text-red-600"></p>
                    </label>
                    @error('nik')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input
                            class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('nama') border-red-500 @enderror"
                            value="{{ old('nama') }}" placeholder="Jane Doe" id="nama" name="nama" />
                    </label>
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                        <input
                            class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('tempat_lahir') border-red-500 @enderror"
                            value="{{ old('tempat_lahir') }}" placeholder="Padang" id="tempat_lahir"
                            name="tempat_lahir" />
                    </label>
                    @error('tempat_lahir')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                        <input
                            class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('tanggal_lahir') border-red-500 @enderror"
                            value="{{ old('tanggal_lahir') }}" placeholder="Jane Doe" id="tanggal_lahir"
                            name="tanggal_lahir" type="date" />
                    </label>
                    @error('tanggal_lahir')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Jenis Kelamin
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" />
                                <span class="ml-2">Laki Laki</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" />
                                <span class="ml-2">Perempuan</span>
                            </label>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Pendidikan
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="pendidikan" id="pendidikan">
                            <option value="S3">S3</option>
                            <option value="S2">S2</option>
                            <option value="S1">S1</option>
                            <option value="D3">D3</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="SMA/SLTA">SMA/SLTA</option>
                            <option value="SMP/SLTP">SMP/SLTP</option>
                            <option value="SD/MI">SD/MI</option>
                        </select>
                    </label>
                    @error('pendidikan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Agama
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="agama" id="agama">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </label>
                    @error('agama')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Pekerjaan</span>
                        <input
                            class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('pekerjaan') border-red-500 @enderror"
                            value="{{ old('pekerjaan') }}" placeholder="Jane Doe" id="pekerjaan"
                            name="pekerjaan" />
                    </label>
                    @error('pekerjaan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                        <textarea
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray @error('alamat') border-red-500 @enderror"
                            value="{{ old('alamat') }}" rows="3" placeholder="Enter some long form content." id="alamat"
                            name="alamat"></textarea>
                    </label>
                    @error('alamat')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Status
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status" id="status">
                            <option value="Lajang">Lajang</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Janda">Janda</option>
                            <option value="Duda">Duda</option>
                            <option value="Cerai">Cerai</option>
                        </select>
                    </label>
                    @error('status')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Status Kartu Keluarga
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status_kk" id="status_kk">
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Saudara">Saudara</option>
                        </select>
                    </label>
                    @error('status_kk')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Usia</span>
                        <input
                            class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('usia') border-red-500 @enderror"
                            value="{{ old('usia') }}" placeholder="Jane Doe" id="usia" name="usia"
                            value="" />
                    </label>
                    @error('usia')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Status Tempat Tinggal
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status_tempat_tngl" id="status_tempat_tngl">
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Kos">Kos</option>
                        </select>
                    </label>
                    @error('status_tempat_tngl')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Status Penduduk
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status_kependudukan" id="status_kependudukan">
                            <option value="Baru">Baru</option>
                            <option value="Lama">Lama</option>
                        </select>
                    </label>
                    @error('status_kependudukan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            RW
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="RW" id="RW">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </label>
                    @error('RW')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">RT</span>
                        <input
                            class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('RT') border-red-500 @enderror"
                            value="{{ old('RT') }}" name="RT" value="" id="RT" />
                    </label>
                    @error('RT')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="flex flex-col flex-wrap mb-8 space-y-4 md:flex-row md:items-end md:space-x-4">
                        <!-- Divs are used just to display the examples. Use only the button. -->
                        <div>
                            <button
                                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                </svg>

                                <span>Simpan Data</span>
                            </button>
                        </div>

                        <!-- Divs are used just to display the examples. Use only the button. -->
                        <div>
                            <button
                                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                type="reset">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                <span>Reset</span>
                            </button>
                        </div>

                        <!-- Divs are used just to display the examples. Use only the button. -->

                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    {{-- <script src="{{ url('windmill') }}/public/assets/js/validasiNik.js" defer></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nikInput = document.getElementById("nik");
            const nikError = document.getElementById("nik-error");
            nikInput.addEventListener("input", function() {
                const inputValue = nikInput.value;
                const apiUrl = "{{ route('checkNik') }}";

                fetch(`${apiUrl}?nik=${inputValue}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            nikError.textContent = "NIK sudah ada dalam database.";
                        } else {
                            nikError.textContent = "";
                        }
                    });
            });
        });
    </script>
</x-admin-layout>
