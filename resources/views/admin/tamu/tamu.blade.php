<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Tamu') }}
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
                    <a href="/keluarga" class="block transition hover:text-gray-700"> Tamu </a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div>
        <div class="relative py-5 my-5">
            <a
              class="flex absolute top-0 right-8 items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="{{ route('tamu.create') }}"
              >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              
              <span>Tambah Data</span>
            </a> 
        </div>
        </div>
        <div class="max-w-5xl sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <!-- With actions -->
                    <h4
                        class="mb-4 text-lg text-center font-semibold text-gray-600 dark:text-gray-300"
                    >
                        Daftar Tamu Warga
                    </h4>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="tabelTamu">
                            <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                                <th class="px-4 py-3">NIK</th>
                                <th class="px-4 py-3">Nama Tamu</th>
                                <th class="px-4 py-3">NIK Tamu</th>
                                <th class="px-4 py-3">Keperluan</th>
                                <th class="px-4 py-3">Lama Bertamu</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >
                            @foreach ($tamus as $tamu)
                                        
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                          <p class="font-semibold">{{ $tamu->tamuRelation->nik }}</p>
                                        </div>
                                      </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $tamu['nama_tamu'] }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $tamu['nik_tamu'] }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $tamu['keperluan'] }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $tamu['lama_bertamu'] }}
                                </td>
                                <td class="px-2 py-2">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a
                                          class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                          aria-label="Edit" href="{{ route('tamu.edit', ['tamu' => $tamu->id]) }}" 
                                        >
                                          <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                          >
                                            <path
                                              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                            ></path>
                                          </svg>
                                        </a>
                                        <form action="{{ route('tamu.destroy', ['tamu' => $tamu->id]) }}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"
                                                >
                                                <svg
                                                    class="w-5 h-5"
                                                    aria-hidden="true"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                >
                                                    <path
                                                    fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                    ></path>
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
    <script>
        $(document).ready(function() {
            $('#tabelTamu').DataTable({
            search: {
                return: true
            },
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]  
            })
        })

    </script>
</x-admin-layout>
