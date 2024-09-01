@extends('admin.layouts.main', [
    'title' => 'Faktur Pajak | E-Faktur CV Sayovi Karyatama',
    'active' => 'Faktur Pajak',
])

@section('content')
    <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
            <div class="border-b px-6">
                <div class="flex justify-between -mb-px">
                    <div class="lg:hidden text-blue-dark py-4 text-lg">
                        Manajemen Data Faktur Pajak
                    </div>
                    <div class="hidden lg:flex">
                        <button type="button" class="appearance-none py-4 text-blue-dark border-b border-primary mr-6">
                            Rekapitulasi &middot; Data Faktur Pajak
                        </button>
                    </div>
                    <div class="flex text-sm">
                        <button type="button"
                            class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3">
                            1M
                        </button>
                        <button type="button"
                            class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3">
                            1D
                        </button>
                        <button type="button"
                            class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3">
                            1W
                        </button>
                        <button type="button" class="appearance-none py-4 text-blue-dark border-b border-primary mr-3">
                            1M
                        </button>
                        <button type="button"
                            class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3">
                            1Y
                        </button>
                        <button type="button"
                            class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark">
                            ALL
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex items-center px-6 lg:hidden">
                <div class="flex-grow flex-no-shrink py-6">
                    <div class="text-grey-darker mb-2">
                        <span class="text-3xl align-top">Faktur Pajak</span>
                        <span class="text-5xl">{{ $fakturPajaks->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex">
                <div class="w-full text-center py-8">
                    <div class="border-r">
                        <div class="text-grey-darker mb-2">
                            <span class="text-5xl">{{ $fakturPajaks->count() }}</span>
                        </div>
                        <div class="text-sm uppercase text-grey tracking-wide">
                            Total Faktur Pajak
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            <div class="w-full mb-6 lg:mb-0  px-4 flex flex-col">
                <div
                    class="w-full overflow-x-scroll flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow ">
                    <div class="border-b">
                        <div class="flex justify-between px-6 -mb-px items-center gap-2">
                            <h3
                                class="text-blue-dark py-4 flex justify-between px-6 -mb-px items-center gap-2 font-normal text-lg">
                                <i class='bx bxs-briefcase-alt-2 text-3xl'></i> Data Faktur Pajak
                            </h3>
                            @if (Auth::guard('admin')->user()->role === 'Admin')
                                <div class="flex">
                                    <button type="button" data-modal-target="add-faktur-modal"
                                        data-modal-toggle="add-faktur-modal"
                                        class="appearance-none py-2 px-3 duration-700 hover:bg-primary text-primary hover:text-white border rounded-lg border-primary hover:border-grey-dark ">
                                        Tambah Data Faktur
                                    </button>
                                </div>
                            @endif()

                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs  text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">No</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Pengusaha Kena Pajak
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Pembeli Kena Pajak</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">No Seri Faktur</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Harga Jual</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Dikurangi Potongan
                                    Harga</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Dikurangi Uang Muka
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Dasar Pengenaan Pajak
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Total PPN</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Total PPnBM</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Lokasi</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">TTD</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($fakturPajaks as $index => $fakturPajak)
                                <tr class="transition-all hover:bg-[#f9f9f9]">
                                    <td class="px-6 py-4 uppercase">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->getPengusahaKenaPajak->nama }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->getPembeliKenaPajak->nama }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->no_seri_faktur }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->harga_jual }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->dikurangi_potongan_harga }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->dikurangi_uang_muka }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->dasar_pengenaan_pajak }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->total_ppn }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->total_ppnbm }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->location }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $fakturPajak->ttd }}</td>
                                    <td class="px-6 py-4 uppercase flex gap-2 h-full items-center">
                                        <a href="/admin/faktur/{{ $fakturPajak->id }}"
                                            class="appearance-none py-2 px-3 duration-700 hover:bg-yellow-600 text-yellow-600 hover:text-white border rounded-lg border-yellow-600 hover:border-grey-dark ">
                                            Faktur
                                        </a>
                                        @if (Auth::guard('admin')->user()->role != 'Direktur')
                                            <button type="button"
                                                data-modal-target="edit-faktur-modal-{{ $fakturPajak->id }}"
                                                data-modal-toggle="edit-faktur-modal-{{ $fakturPajak->id }}"
                                                class="appearance-none py-2 px-3 duration-700 hover:bg-green-600 text-green-600 hover:text-white border rounded-lg border-green-600 hover:border-grey-dark ">
                                                Edit
                                            </button>
                                            <form action="{{ route('admin.faktur.destroy', $fakturPajak->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value={{ $fakturPajak->id }}>
                                                <button type="submit"
                                                    class="appearance-none py-2 px-3 duration-700 hover:bg-red-600 text-red-600 hover:text-white border rounded-lg border-red-600 hover:border-grey-dark ">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>

                                <div id="edit-faktur-modal-{{ $fakturPajak->id }}" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-hide="edit-faktur-modal-{{ $fakturPajak->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit
                                                    Data Faktur Pajak</h3>
                                                <form class="space-y-6" action="{{ route('admin.faktur.update') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value={{ $fakturPajak->id }}>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div>
                                                            <label for="id_pengusaha_kena_pajak"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengusaha
                                                                Kena Pajak</label>
                                                            <select id="id_pengusaha_kena_pajak"
                                                                name="id_pengusaha_kena_pajak"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none">
                                                                @foreach ($pengusahaKenaPajaks as $pengusaha)
                                                                    <option value="{{ $pengusaha->id }}"
                                                                        {{ $fakturPajak->id_pengusaha_kena_pajak == $pengusaha->id ? 'selected' : '' }}>
                                                                        {{ $pengusaha->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for="id_pembeli_kena_pajak"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Pembeli Kena Pajak
                                                            </label>
                                                            <select id="id_pembeli_kena_pajak"
                                                                name="id_pembeli_kena_pajak"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none">
                                                                @foreach ($pembeliKenaPajaks as $pembeli)
                                                                    <option value="{{ $pembeli->id }}"
                                                                        {{ $fakturPajak->id_pembeli_kena_pajak == $pembeli->id ? 'selected' : '' }}>
                                                                        {{ $pembeli->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div>
                                                            <label for="no_seri_faktur"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                                                Seri Faktur</label>
                                                            <input type="text" id="no_seri_faktur"
                                                                name="no_seri_faktur"
                                                                value="{{ $fakturPajak->no_seri_faktur }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                        <div>
                                                            <label for="harga_jual"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                                Jual</label>
                                                            <input type="number" id="harga_jual" name="harga_jual"
                                                                value="{{ $fakturPajak->harga_jual }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div>
                                                            <label for="dikurangi_potongan_harga"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dikurangi
                                                                Potongan Harga</label>
                                                            <input type="number" id="dikurangi_potongan_harga"
                                                                name="dikurangi_potongan_harga"
                                                                value="{{ $fakturPajak->dikurangi_potongan_harga }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                        <div>
                                                            <label for="dikurangi_uang_muka"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dikurangi
                                                                Uang Muka</label>
                                                            <input type="number" id="dikurangi_uang_muka"
                                                                name="dikurangi_uang_muka"
                                                                value="{{ $fakturPajak->dikurangi_uang_muka }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div>
                                                            <label for="dasar_pengenaan_pajak"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dasar
                                                                Pengenaan Pajak</label>
                                                            <input type="number" id="dasar_pengenaan_pajak"
                                                                name="dasar_pengenaan_pajak"
                                                                value="{{ $fakturPajak->dasar_pengenaan_pajak }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                        <div>
                                                            <label for="total_ppnbm"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PPnBM</label>
                                                            <input type="number" id="total_ppnbm" name="total_ppnbm"
                                                                value="{{ $fakturPajak->total_ppnbm }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class=" gap-4">

                                                        <div>
                                                            <label for="location"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                                                            <input type="text" id="location" name="location"
                                                                value="{{ $fakturPajak->location }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="ttd"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TTD</label>
                                                        <input type="text" id="ttd" name="ttd"
                                                            value="{{ $fakturPajak->ttd }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                            required>
                                                    </div>
                                                    <button type="submit"
                                                        class="w-full mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                                                        Data Faktur Pajak</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Faktur -->
    <div id="add-faktur-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-modal md:h-full">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Faktur Pajak
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-faktur-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.faktur.store') }}" method="POST">
                    @csrf
                    <div class="p-6 space-y-2">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="id_pengusaha_kena_pajak"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengusaha Kena
                                    Pajak</label>
                                <select id="id_pengusaha_kena_pajak" name="id_pengusaha_kena_pajak"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none">
                                    <option value="">Pilih Pengusaha Kena Pajak</option>
                                    @foreach ($pengusahaKenaPajaks as $pengusaha)
                                        <option value="{{ $pengusaha->id }}">{{ $pengusaha->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="id_pembeli_kena_pajak"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembeli Kena
                                    Pajak</label>
                                <select id="id_pembeli_kena_pajak" name="id_pembeli_kena_pajak"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 appearance-none">
                                    <option value="">Pilih Pembeli Kena Pajak</option>
                                    @foreach ($pembeliKenaPajaks as $pembeli)
                                        <option value="{{ $pembeli->id }}">{{ $pembeli->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" gap-4">
                            <div>
                                <label for="no_seri_faktur"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Seri
                                    Faktur</label>
                                <input type="text" id="no_seri_faktur" name="no_seri_faktur"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>

                        </div>
                        <div class="gap-4">

                            <div>
                                <label for="location"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                                <input type="text" id="location" name="location"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label for="ttd"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TTD</label>
                            <input type="text" id="ttd" name="ttd"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                    </div>
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                        <button type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                            data-modal-hide="add-faktur-modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelector(button.getAttribute('data-modal-hide')).classList.add('hidden');
            });
        });
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.getAttribute('data-modal-toggle'));
                modal.classList.toggle('hidden');
            });
        });
    </script>
@endsection
