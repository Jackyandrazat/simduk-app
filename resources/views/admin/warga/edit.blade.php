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
                    <a href="{{ route('warga.edit', ['warga' => $warga->id]) }}" class="block transition hover:text-gray-700"> Edit Warga </a>
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
                Edit Data Warga
            </h4>
            <div
                class="px-4 py- mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="{{ route('warga.edit', ['warga' => $warga->id]) }}" method="POST">
                @csrf
                    @method('PUT')
                    <label class="block text-sm mt-5">
                        <span class="text-gray-700 dark:text-gray-400">NIK</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe"  name="nik" value="{{ $warga->nik }}" required
                        />
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Nomor Kartu Keluarga</span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="keluarga_id" id="keluarga_id"
                        >
                        @foreach ($keluargas as $keluarga)
							<option value="{{ $keluarga->id }}">{{ $keluarga->no_kk }} --> {{ $keluarga->nama_keluarga }} </option>
						@endforeach
                        {{-- <option value="Islam" {{ $warga->agama === 'Islam' ? 'selected' : '' }}>Islam</option> --}}
                        </select>
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" name="nama" value="{{ $warga->nama }}" required
                        />
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" name="tempat_lahir" value="{{ $warga->tempat_lahir }}" required
                        />
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" name="tanggal_lahir"  type="date" value="{{ $warga->tanggal_lahir }}" required
                        />
                    </label>
                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Jenis Kelamin
                        </span>
                        <div class="mt-2">
                        <label
                            class="inline-flex items-center text-gray-600 dark:text-gray-400"
                        >
                            <input
                            type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="jenis_kelamin" value="Laki-laki" {{ $warga->jenis_kelamin === 'Laki-laki' || 'Laki-Laki' || 'laki-laki' ? 'checked' : '' }}
                            />
                            <span class="ml-2">Laki Laki</span>
                        </label>
                        <label
                            class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                        >
                            <input
                            type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="jenis_kelamin" value="Perempuan" {{ $warga->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}
                            />
                            <span class="ml-2">Perempuan</span>
                        </label>
                        </div>
                    </div>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Pendidikan
                        </span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="pendidikan"
                        >
                            <option value="S3" {{ $warga->pendidikan === 'S3' ? 'selected' : '' }}>S3</option>
                            <option value="S2" {{ $warga->pendidikan === 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S1" {{ $warga->pendidikan === 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="D3" {{ $warga->pendidikan === 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D1" {{ $warga->pendidikan === 'D1' ? 'selected' : '' }}>D1</option>
                            <option value="D2" {{ $warga->pendidikan === 'D2' ? 'selected' : '' }}>D2</option>
                            <option value="SMA/SLTA" {{ $warga->pendidikan === 'SMA/SLTA' ? 'selected' : '' }}>SMA/SLTA</option>
                            <option value="SMP/SLTP" {{ $warga->pendidikan === 'SMP/SLTP' ? 'selected' : '' }}>SMP/SLTP</option>
                            <option value="SD/MI" {{ $warga->pendidikan === 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Agama
                        </span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="agama"
                        >
                        <option value="Islam" {{ $warga->agama === 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ $warga->agama === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Budha" {{ $warga->agama === 'Budha' ? 'selected' : '' }}>Budha</option>
                        <option value="Hindu" {{ $warga->agama === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Konghucu" {{ $warga->agama === 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Pekerjaan</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" name="pekerjaan" value="{{ $warga->pekerjaan }}" required
                        />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                        <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3"
                        placeholder="Enter some long form content." name="alamat"
                        >{{ $warga->alamat }}</textarea>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Alamat Sekarang</span>
                        <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3"
                        placeholder="Enter some long form content." name="alamat_baru"
                        >{{ $warga->alamat_baru }}</textarea>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Status
                        </span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status"
                        >
                        <option value="Lajang" {{ $warga->status === 'Lajang' ? 'selected' : '' }}>Lajang</option>
                        <option value="Menikah" {{ $warga->status === 'Menikah' ? 'selected' : '' }}>Menikah</option>
                        <option value="Janda" {{ $warga->status === 'Janda' ? 'selected' : '' }}>Janda</option>
                        <option value="Duda" {{ $warga->status === 'Duda' ? 'selected' : '' }}>Duda</option>
                        <option value="Cerai" {{ $warga->status === 'Cerai' ? 'selected' : '' }}>Cerai</option>
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Status Kartu Keluarga
                        </span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status_kk"
                        >
                        <option value="Suami" {{ $warga->status_kk === 'Suami' ? 'selected' : '' }}>Suami</option>
                        <option value="Istri" {{ $warga->status_kk === 'Istri' ? 'selected' : '' }}>Istri</option>
                        <option value="Anak" {{ $warga->status_kk === 'Anak' ? 'selected' : '' }}>Anak</option>
                        <option value="Saudara" {{ $warga->status_kk === 'Saudara' ? 'selected' : '' }}>Saudara</option>
                        </select>
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">Usia</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" name="usia" value="{{ $warga->usia }}" required
                        />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Status Tempat Tinggal
                        </span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status_tempat_tngl"
                        >
                        <option value="Tetap" {{ $warga->status_tempat_tngl === 'Tetap' ? 'selected' : '' }}>Tetap</option>
                        <option value="Kontrak" {{ $warga->status_tempat_tngl === 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        <option value="Kos" {{ $warga->status_tempat_tngl === 'Kos' ? 'selected' : '' }}>Kos</option>
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        Status Penduduk
                        </span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="status_kependudukan"
                        >
                        <option value="Baru" {{ $warga->status_kependudukan === 'Baru' ? 'selected' : '' }}>Baru</option>
                        <option value="Lama" {{ $warga->status_kependudukan === 'Lama' ? 'selected' : '' }}>Lama</option>
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                        RW
                        </span>
                        <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="RW"
                        >
                        <option value="1" {{ $warga->RW === '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $warga->RW === '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $warga->RW === '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $warga->RW === '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $warga->RW === '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $warga->RW === '6' ? 'selected' : '' }}>6</option>
                        </select>
                    </label>
                    <label class="block text-sm mt-3">
                        <span class="text-gray-700 dark:text-gray-400">RT</span>
                        <input
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="RT" value="{{ $warga->RT }}" required 
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
