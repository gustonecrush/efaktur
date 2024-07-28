@extends('admin.layouts.main', [
    'active' => 'Faktur Pajak',
    'title' => $fakturPajaks->getPengusahaKenaPajak->nama . ' Faktur | E-Faktur CV Sayovi Karyatama',
])

@section('content')
    <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        @if (Auth::guard('admin')->user()->role == 'Admin')
            <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
                <div class="border-b px-6">
                    <div class="flex justify-between -mb-px">
                        <div class="lg:hidden text-blue-dark py-4 text-lg">
                        </div>
                        <div class="hidden lg:flex">
                            <button type="button" class="appearance-none py-4 text-blue-dark border-b border-primary mr-6">
                                &middot; Faktur {{ $fakturPajaks->no_seri_faktur }} •
                                {{ $fakturPajaks->getPengusahaKenaPajak->nama }}
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
                        </div>
                    </div>
                </div>
                <div class="hidden lg:flex">
                    <div class="w-full text-center py-8">
                        <div class="border-r">
                            <div class="text-grey-darker mb-2">
                            </div>
                            <div class="text-sm uppercase text-grey tracking-wide">
                                Total Barang/Jasa Kena Pajak
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full mb-6 lg:mb-0  px-4 flex flex-col">
                    <div
                        class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                        <div class="border-b">
                            <div class="flex justify-between px-6 py-4 -mb-px items-center gap-2">
                                <h3
                                    class="text-blue-dark py-4 flex justify-between px-6 -mb-px items-center gap-2 font-normal text-lg">
                                </h3>
                                <div class="flex">
                                    <button type="button" data-modal-target="add-barang-modal"
                                        data-modal-toggle="add-barang-modal"
                                        class="appearance-none py-2 px-3 duration-700 hover:bg-primary text-primary hover:text-white border rounded-lg border-primary hover:border-grey-dark ">Tambahkan
                                        Barang/Jasa
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left  rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs  text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium text-sm">No</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-sm">Nama Barang/Jasa</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-sm">Harga Satuan</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-sm">Kuantitas</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-sm">Total</th>
                                    <th scope="col" class="px-6 py-3 font-medium text-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($fakturPajaks->getBarangJasaKenaPajak as $index => $barang)
                                    <tr class="transition-all hover:bg-[#f9f9f9]">
                                        <td class="px-6 py-4 uppercase">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 uppercase">{{ $barang->nama_barang_jasa_kena_pajak }}</td>
                                        <td class="px-6 py-4 uppercase">{{ $barang->harga_satuan }}</td>
                                        <td class="px-6 py-4 uppercase">{{ $barang->kuantitas }}</td>
                                        <td class="px-6 py-4 uppercase">{{ $barang->total }}</td>
                                        <td class="px-6 py-4 uppercase flex gap-2 h-full items-center">

                                            {{-- <button type="button" data-modal-target="edit-faktur-modal-{{ $barang->id }}"
                                                data-modal-toggle="edit-faktur-modal-{{ $barang->id }}"
                                                class="appearance-none py-2 px-3 duration-700 hover:bg-green-600 text-green-600 hover:text-white border rounded-lg border-green-600 hover:border-grey-dark ">
                                                Edit
                                            </button> --}}
                                            <form action="{{ route('admin.barang.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value={{ $barang->id }}>
                                                <input type="hidden" name="total" value={{ $barang->total }}>
                                                <input type="hidden" name="faktur_id" value={{ $fakturPajaks->id }}>
                                                <button type="submit"
                                                    class="appearance-none py-2 px-3 duration-700 hover:bg-red-600 text-red-600 hover:text-white border rounded-lg border-red-600 hover:border-grey-dark ">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- <div id="edit-faktur-modal-{{ $fakturPajak->id }}" tabindex="-1"
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
                                                <form class="space-y-6" action="{{ route('admin.barang.update') }}"
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
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                @foreach ($pengusahaKenaPajaks as $pengusaha)
                                                                    <option value="{{ $pengusaha->id }}"
                                                                        {{ $fakturPajak->id_pengusaha_kena_pajak == $pengusaha->id ? 'selected' : '' }}>
                                                                        {{ $pengusaha->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for="id_pembeli_kena_pajak"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembeli
                                                                Kena Pajak</label>
                                                            <select id="id_pembeli_kena_pajak"
                                                                name="id_pembeli_kena_pajak"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                @foreach ($pembeliKenaPajaks as $pembeli)
                                                                    <option value="{{ $pembeli->id }}"
                                                                        {{ $fakturPajak->id_pembeli_kena_pajak == $pembeli->id ? 'selected' : '' }}>
                                                                        {{ $pembeli->nama }}</option>
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
                                                            <label for="total_ppn"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                                PPN</label>
                                                            <input type="number" id="total_ppn" name="total_ppn"
                                                                value="{{ $fakturPajak->total_ppn }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div>
                                                            <label for="total_ppnbm"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                                PPnBM</label>
                                                            <input type="number" id="total_ppnbm" name="total_ppnbm"
                                                                value="{{ $fakturPajak->total_ppnbm }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                required>
                                                        </div>
                                                        <div>
                                                            <label for="location"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                                                            <input type="number" id="location" name="location"
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
                                </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endif

        @if (sizeof($fakturPajaks->getBarangJasaKenaPajak) !== 0)
            <div class="flex flex-wrap -mx-4 mt-5">
                <div class="w-full mb-6 lg:mb-0  px-4 flex flex-col">
                    <div
                        class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                        <div class="">
                            <button id="export-btn" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Send and Save Faktur
                            </button>
                        </div>
                        <div id="purchase-order" class="max-w-5xl mx-auto p-6 bg-white shadow-md mt-10">
                            <header class="flex justify-between items-center mb-6">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-800"></h1>
                                    <p class="text-sm text-gray-600">Kode dan Nomor Seri Faktur Pajak :
                                        {{ $fakturPajaks->no_seri_faktur }}
                                    </p>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-800">FAKTUR PAJAK</h2>
                            </header>

                            <section class="mb-6">
                                <div class="flex justify-between">
                                    <div class="flex flex-col gap-2">
                                        <div class="w-2/3 uppercase">
                                            <p class="text-sm text-gray-800 font-bold">Pengusaha Kena Pajak</p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">NAMA:</span>
                                                {{ $fakturPajaks->getPengusahaKenaPajak->nama }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">ALAMAT:</span>
                                                {{ $fakturPajaks->getPengusahaKenaPajak->alamat }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">KOTA/KAB:</span>
                                                {{ $fakturPajaks->getPengusahaKenaPajak->kota_kab }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">NPWP:</span>
                                                {{ $fakturPajaks->getPengusahaKenaPajak->npwp }}
                                            </p>
                                        </div>
                                        <hr class="w-full">
                                        <div class="w-full uppercase">
                                            <p class="text-sm text-gray-800 font-bold">Pembeli Kena Pajak</p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">NAMA:</span>
                                                {{ $fakturPajaks->getPembeliKenaPajak->nama }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">ALAMAT:</span>
                                                {{ $fakturPajaks->getPembeliKenaPajak->alamat }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">KOTA/KAB:</span>
                                                {{ $fakturPajaks->getPembeliKenaPajak->kota_kab }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">NPWP:</span>
                                                {{ $fakturPajaks->getPembeliKenaPajak->npwp }}
                                            </p>
                                        </div>
                                    </div>


                                </div>
                            </section>

                            <section>
                                <table class="w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No.</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama Barang Kena Pajak/Jasa Kena Pajak</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Harga Jual/Penggantian/Uang Muka/Termin</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($fakturPajaks->getBarangJasaKenaPajak as $index => $barang)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td
                                                    class="px-6 py-4  text-sm text-gray-500 max-w-md break-words whitespace-normal">
                                                    {{ $barang->nama_barang_jasa_kena_pajak }} <br />
                                                    Rp. {{ $barang->harga_satuan }} x {{ $barang->kuantitas }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex justify-end">
                                                    Rp. {{ $fakturPajaks->harga_jual }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </section>

                            <section class="mt-6 mr-10 ">
                                <div class="flex justify-end">
                                    <div class="w-1/3 -ml-10">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-500 break-words whitespace-normal">
                                                        Harga Jual/Penggantian</td>
                                                    <td
                                                        class="px-6 py-4 text-sm text-gray-500 reak-words whitespace-normal">
                                                        Rp. {{ $fakturPajaks->harga_jual }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-500 break-words whitespace-normal">
                                                        Dikurangi Potongan Harga</td>
                                                    <td
                                                        class="px-6 py-4 text-sm text-gray-500 reak-words whitespace-normal">
                                                        Rp. {{ $fakturPajaks->dikurangi_potongan_harga }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-500 break-words whitespace-normal">
                                                        Dikurangi Uang Muka</td>
                                                    <td
                                                        class="px-6 py-4 text-sm text-gray-500 reak-words whitespace-normal">
                                                        Rp. {{ $fakturPajaks->dikurangi_uang_muka }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-500 break-words whitespace-normal">
                                                        Dasar Pengenaan pajak</td>
                                                    <td
                                                        class="px-6 py-4 text-sm text-gray-500 reak-words whitespace-normal">
                                                        Rp. {{ $fakturPajaks->dasar_pengenaan_pajak }}


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-500 break-words whitespace-normal">
                                                        Total PPN</td>
                                                    <td
                                                        class="px-6 py-4 text-sm text-gray-500 reak-words whitespace-normal">
                                                        Rp. {{ $fakturPajaks->total_ppn }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-500 break-words whitespace-normal">
                                                        Total PPnBM (Pajak Penjual Barang Mewah)</td>
                                                    <td
                                                        class="px-6 py-4 text-sm text-gray-500 reak-words whitespace-normal">
                                                        Rp. {{ $fakturPajaks->total_ppnbm }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>

                            <div class="flex flex-col space-y-4 w-full">
                                <p class="w-full max-w-2xl mt-7 text-xs text-gray-600">
                                    Sesuai dengan ketentuan yang berlaku, Direktorat Jenderal Pajak mengatur bahwa Faktur
                                    Pajak
                                    ini telah ditandatangani secara elektronik sehingga tidak diperlukan tanda tangan basah
                                    pada
                                    Faktur Pajak ini.
                                </p>

                                <div class="flex items-center justify-between mr-10">
                                    <img src={{ asset('assets/images/qr.png') }} class="w-32" />
                                    <div>
                                        <p class="text-sm text-gray-600">PALEMBANG, {{ $fakturPajaks->created_at }}</p>
                                        <div class="h-20"></div>
                                        <p class="text-sm text-gray-800 font-bold">{{ $fakturPajaks->ttd }}
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <p class="text-xs max-w-md mt-10 text-gray-600">
                                PEMBERITAHUAN: Faktur Pajak ini telah dilaporkan ke Direktorat Jenderal Pajak dan telah
                                memperoleh persetujuan sesuai dengan ketentuan peraturan perpajakan yang berlaku.
                                PERINGATAN:
                                PKP yang menerbitkan Faktur Pajak yang tidak sesuai dengan keadaan yang sebenarnya dan/atau
                                sesungguhnya sebagaimana dimaksud Pasal 13 ayat (9) UU PPN dikenai sanksi sesuai dengan
                                Pasal 14
                                ayat (4) UU KUP
                            </p>
                        </div>


                    </div>
                </div>

            </div>
        @endif
    </div>
    <!-- Add Modal -->
    <div id="add-barang-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="add-barang-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Data Barang/Jasa Kena Pajak
                    </h3>
                    <form class="space-y-3" action="{{ route('admin.barang.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value={{ $fakturPajaks->id }}>

                        <div class="flex gap-2">
                            <div class="w-full">
                                <label for="nama_barang_jasa_kena_pajak"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Barang/Jasa</label>
                                <input type="text" name="nama_barang_jasa_kena_pajak" id="nama_barang_jasa_kena_pajak"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <label for="harga_satuan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                    Satuan</label>
                                <input type="text" name="harga_satuan" id="harga_satuan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <label for="kuantitas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuantitas</label>
                                <input type="number" name="kuantitas" id="kuantitas"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                            Data Barang/Jasa</button>
                    </form>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        document.getElementById('export-btn').addEventListener('click', function() {
            html2canvas(document.getElementById('purchase-order')).then(function(canvas) {
                const {
                    jsPDF
                } = window.jspdf;

                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgData = canvas.toDataURL('image/png');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('{{ $fakturPajaks->no_seri_faktur }}.pdf');

                Toastify({
                    text: "Successfully downloaded Faktur",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#48bb78",
                    stopOnFocus: true
                }).showToast();
            }).catch(error => {
                console.error('Error:', error);
                Toastify({
                    text: "Download failed",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f56565",
                    stopOnFocus: true
                }).showToast();
            });
        });
    </script>

@endsection
