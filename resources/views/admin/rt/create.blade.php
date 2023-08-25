<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Perangkat RT') }}
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
                    <a href="/rt" class="block transition hover:text-gray-700"> Perangkat RT </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <a href="{{ route('meninggal.create') }}" class="block transition hover:text-gray-700"> Tambah Data Perangkat RT </a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div>
        <div class="container px-6 mx-auto grid">
            <!-- General elements -->
            <h4
                class="mb-4 text-lg text-center font-semibold text-gray-600 dark:text-gray-300"
            >
                Tambah Data Perangkat RT
            </h4>
            <div
                class="px-4 py- mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="{{ route('rt.store')}}" method="POST">
                @csrf
                <label class="block text-sm mt-3">
                    <span class="text-gray-700 dark:text-gray-400">Nama</span>
                    <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray"
                    name="nik" id="nik"
                    >
                    @foreach ($wargas as $warga)
                    <option value="{{ $warga->id }}">{{ $warga->nama }} </option>
                    @endforeach
                    {{-- <option value="Islam" {{ $warga->agama === 'Islam' ? 'selected' : '' }}>Islam</option> --}}
                </select>
                </label>
                <label class="block text-sm mt-5">
                    <span class="text-gray-700 dark:text-gray-400">Jabatan</span>
                    <input
                    class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('jabatan') border-red-500 @enderror" value="{{ old ('jabatan') }}" 
                    placeholder="Jabatan" id="jabatan"  name="jabatan" required
                    />
                </label>
                <label class="block text-sm mt-3">
                    <span class="text-gray-700 dark:text-gray-400">Tanggal Diangkat</span>
                    <input
                    class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('tanggal_diangkat') border-red-500 @enderror" value="{{ old ('tanggal_diangkat') }}"
                    placeholder="Tanggal Diangkat" type="date" id="tanggal_diangkat" name="tanggal_diangkat"  required
                    />
                </label>
                <label class="block text-sm mt-3">
                    <span class="text-gray-700 dark:text-gray-400">Tanggal Selesai</span>
                    <input
                    class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('tanggal_selesai') border-red-500 @enderror" value="{{ old ('tanggal_selesai') }}"
                    placeholder="Tanggal Selesai" type="date" id="tanggal_selesai" name="tanggal_selesai"  required
                    />
                </label>
                <label class="block text-sm mt-5">
                    <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
                    <input
                    class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('keterangan') border-red-500 @enderror" value="{{ old ('keterangan') }}" 
                    placeholder="Keterangan" id="keterangan"  name="keterangan" required
                    />
                </label>
                    
                    <div
                    class="flex flex-col flex-wrap mb-8 space-y-4 md:flex-row md:items-end md:space-x-4"
                    >
                    <!-- Divs are used just to display the examples. Use only the button. -->
                    <div>
                        <button
                          class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                            type="submit"
                          >
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                          </svg>
                          
                          <span>Simpan Data</span>
                        </button>
                    </div>

                    <!-- Divs are used just to display the examples. Use only the button. -->
                    <div>
                        <button
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" type="reset"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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
</x-admin-layout>
