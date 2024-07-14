@extends('layouts.dashboard', [
    'title' => 'Pengelolaan Bahan Mentah - Nadia Collection',
])

@section('content')
    <div class="flex flex-col gap-10">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col ">
                <h1 class="text-2xl font-semibold">📦 Pengelolaan Data Bahan Mentah </h1>
                <p class="text-gray-400 text-sm max-w-md">
                    Lakukan pengelolaan data bahan mentah dari supplier untuk penggunaan produksi pada Nadia Collection.
                </p>
            </div>
            <div class="flex w-fit gap-3">
                <button data-modal-target="add-paket-modal" data-modal-toggle="add-paket-modal"
                    class="flex gap-2 items-center justify-center bg-primary rounded-xl px-4 py-3 text-white cursor-pointer text-xs">
                    <p>Tambah Data</p>
                    <i class='bx bx-plus-circle'></i>
                </button>
            </div>
        </div>
        @if (session('success'))
            <div class="text-green-500">{{ session('success') }}</div>
        @endif
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Supplier</th>
                        <th scope="col" class="px-6 py-3">Nama Bahan</th>
                        <th scope="col" class="px-6 py-3">Kuantitas</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">File Gambar</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($bahanMentahs as $index => $bahanMentah)
                        <tr class="transition-all hover:bg-[#f9f9f9]">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $bahanMentah->supplier->nama }}</td>
                            <td class="px-6 py-4">{{ $bahanMentah->nama }}</td>
                            <td class="px-6 py-4">{{ $bahanMentah->kuantitas }} {{ $bahanMentah->satuan }} </td>
                            <td class="px-6 py-4">{{ $bahanMentah->harga }}</td>
                            <td class="px-6 py-4">
                                @if ($bahanMentah->file_gambar)
                                    <img src="{{ asset('storage/' . $bahanMentah->file_gambar) }}" alt="Gambar Bahan"
                                        class="w-16 h-16 object-cover">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <button data-modal-target="edit-modal-{{ $bahanMentah->id }}"
                                    data-modal-toggle="edit-modal-{{ $bahanMentah->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class='bx bx-edit-alt'></i>Edit
                                </button>
                                <form action="{{ route('admin.bahan-mentah.delete') }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $bahanMentah->id }}" name="id">
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <i class='bx bx-trash-alt'></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div id="edit-modal-{{ $bahanMentah->id }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-lg max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit Data Bahan Mentah
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="edit-modal-{{ $bahanMentah->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-4">
                                        <form action="{{ route('admin.bahan-mentah.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value={{ $bahanMentah->id }}>
                                            <div class="flex gap-2 w-full">
                                                <div class="mb-4 w-full">
                                                    <label for="nama"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama
                                                        Bahan
                                                    </label>
                                                    <input type="text" id="nama" name="nama"
                                                        value="{{ $bahanMentah->nama }}"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                                    @error('nama')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4 w-full">
                                                    <label for="kuantitas"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Kuantitas
                                                    </label>
                                                    <input type="text" id="kuantitas" name="kuantitas"
                                                        value="{{ $bahanMentah->kuantitas }}"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                                    @error('kuantitas')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex gap-2 w-full">
                                                <div class="mb-4 w-full">
                                                    <label for="supplier_id"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Supplier
                                                    </label>
                                                    <select id="supplier_id" name="supplier_id"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                                        <option value="">Pilih Supplier</option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                {{ $bahanMentah->supplier_id == $supplier->id ? 'selected' : '' }}>
                                                                {{ $supplier->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('supplier_id')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex gap-2 w-full">
                                                <div class="mb-4 w-full">
                                                    <label for="satuan"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Satuan
                                                    </label>
                                                    <input type="text" id="satuan" name="satuan"
                                                        value="{{ $bahanMentah->satuan }}"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                                    @error('satuan')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4 w-full">
                                                    <label for="harga"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Harga
                                                        (Rp)
                                                    </label>
                                                    <input type="text" id="harga" name="harga"
                                                        value="{{ $bahanMentah->harga }}"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                                    @error('harga')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4 w-full">
                                                <label for="file_gambar"
                                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">File
                                                    Gambar
                                                </label>
                                                <input type="file" id="file_gambar" name="file_gambar"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                                @if ($bahanMentah->file_gambar)
                                                    <img src="{{ asset('storage/' . $bahanMentah->file_gambar) }}"
                                                        alt="Gambar Bahan" class="w-16 h-16 object-cover mt-2">
                                                @endif
                                            </div>
                                            <div class="flex items-center justify-end">
                                                <button type="submit"
                                                    class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Update
                                                    Data</button>
                                            </div>
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

    <!-- Modal for Adding Paket Umrah -->
    <div id="add-paket-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Bahan Mentah
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-paket-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <form action="{{ route('admin.bahan-mentah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-2 w-full">
                            <div class="mb-4 w-full">
                                <label for="nama"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama Bahan
                                </label>
                                <input type="text" id="nama" name="nama"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('nama')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 w-full">
                                <label for="kuantitas"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Kuantitas
                                </label>
                                <input type="text" id="kuantitas" name="kuantitas"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('kuantitas')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-2 w-full">
                            <div class="mb-4 w-full">
                                <label for="supplier_id"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Supplier
                                </label>
                                <select id="supplier_id" name="supplier_id"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">
                                            <div class="flex flex-col gap-1">
                                                <p>{{ $supplier->nama }}</p>
                                                <p class="text-sm text-gray-400">
                                                    {{ $supplier->alamat }} | {{ $supplier->email }} |
                                                    {{ $supplier->no_telpon }}
                                                </p>
                                            </div>
                                        </option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="flex gap-2 w-full">
                            <div class="mb-4 w-full">
                                <label for="satuan"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Satuan
                                </label>
                                <input type="text" id="satuan" name="satuan"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('satuan')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-4 w-full">
                                <label for="harga"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Harga
                                    (Rp)</label>
                                <input type="text" id="harga" name="harga"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('harga')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 w-full">
                            <label for="file_gambar"
                                class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">File Gambar
                            </label>
                            <input type="file" id="file_gambar" name="file_gambar"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">

                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Tambahkan
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Include Flowbite JavaScript library -->
    <script src="https://unpkg.com/flowbite@1.3.1/dist/flowbite.min.js"></script>
@endsection
