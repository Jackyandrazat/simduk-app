<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tamu Page') }}
        </h2>
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
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
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
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="00.00" name="date_meninggal" value="{{ $meninggal->date_meninggal }}" required
                        />
                    </label>
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">Jam Meninggal</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe"  name="jam" value="{{ $meninggal->jam }}" required
                        />
                    </label>
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">Lokasi Meninggal</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe"  name="lokasi_meninggal" value="{{ $meninggal->lokasi_meninggal }}" required
                        />
                    </label>
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">Lokasi Meninggal</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe"  name="lokasi_pemakaman" value="{{ $meninggal->lokasi_pemakaman }}" required
                        />
                    </label>
                    <div class="py-5">
                        <button
                          class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
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
