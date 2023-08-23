<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Kejadian Meninggal') }}
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
                    <a href="/meninggal" class="block transition hover:text-gray-700"> Kejadian Meninggal </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <a href="{{ route('meninggal.edit', ['meninggal' => $meninggal->id]) }}" class="block transition hover:text-gray-700"> Edit Data Kejadian Meninggal </a>
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
                Edit Data Tamu
            </h4>
            <div
                class="px-4 py- mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="{{ route('meninggal.edit', ['meninggal' => $meninggal->id]) }}" method="POST">
                @csrf
                    @method('PUT')
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">NIK</span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:focus:shadow-outline-gray"
                        name="nik" id="nik"
                        >
                        @foreach ($wargas as $warga)
							<option value="{{ $warga->id }}">{{ $warga->nik }} --> {{ $warga->nama }} </option>
						@endforeach
                        {{-- <option value="Islam" {{ $warga->agama === 'Islam' ? 'selected' : '' }}>Islam</option> --}}
                        </select>
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Tanggal Meninggal</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="00.00" name="date_meninggal" value="{{ $meninggal->date_meninggal }}" required
                        />
                    </label>
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">Jam Meninggal</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe"  name="jam" value="{{ $meninggal->jam }}" required
                        />
                    </label>
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">Lokasi Meninggal</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe"  name="lokasi_meninggal" value="{{ $meninggal->lokasi_meninggal }}" required
                        />
                    </label>
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">Lokasi Meninggal</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe"  name="lokasi_pemakaman" value="{{ $meninggal->lokasi_pemakaman }}" required
                        />
                    </label>
                    <div class="py-5">
                        <button
                          class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                            type="submit"
                          >
                          <span>Perbarui Data</span>
                        </button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
