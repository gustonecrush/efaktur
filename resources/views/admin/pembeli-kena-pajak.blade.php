@extends('admin.layouts.main', [
    'title' => 'Manajemen Data PBKP CV Sayovi Karyatama',
    'active' => 'Pembeli Kena Pajak',
])

@section('content')
    <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
            <div class="border-b px-6">
                <div class="flex justify-between -mb-px">
                    <div class="lg:hidden text-blue-dark py-4 text-lg">
                        Manajemen Data PBKP
                    </div>
                    <div class="hidden lg:flex">
                        <button type="button" class="appearance-none py-4 text-blue-dark border-b border-primary mr-6">
                            Rekapitulasi &middot; Data Pembeli Kena Pajak
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
                        <span class="text-3xl align-top">PBKP</span>
                        <span class="text-5xl">{{ $pbkps->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex">
                <div class="w-full text-center py-8">
                    <div class="border-r">
                        <div class="text-grey-darker mb-2">
                            <span class="text-5xl">{{ $pbkps->count() }}</span>
                        </div>
                        <div class="text-sm uppercase text-grey tracking-wide">
                            Total Pembeli Kena Pajak
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            <div class="w-full mb-6 lg:mb-0  px-4 flex flex-col">
                <div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                    <div class="border-b">
                        <div class="flex justify-between px-6 -mb-px items-center gap-2">
                            <h3
                                class="text-blue-dark py-4 flex justify-between px-6 -mb-px items-center gap-2 font-normal text-lg">
                                <i class='bx bxs-cart-alt text-2xl'></i>Data Pembeli Kena Pajak
                            </h3>
                            <div class="flex">
                                <button type="button" data-modal-target="add-pkp-modal" data-modal-toggle="add-pkp-modal"
                                    class="appearance-none py-2 px-3 duration-700 hover:bg-primary text-primary hover:text-white border rounded-lg border-primary hover:border-grey-dark ">
                                    Tambah Data PBKP (Pembeli Kena Pajak)
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left  rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs  text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium text-sm">No</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm">Nama</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm">Alamat</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm">Kota/Kab</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm">NPWP</th>
                                <th scope="col" class="px-6 py-3 font-medium text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($pbkps as $index => $pkp)
                                <tr class="transition-all hover:bg-[#f9f9f9]">
                                    <td class="px-6 py-4 uppercase">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $pkp->nama }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $pkp->alamat }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $pkp->kota_kab }}</td>
                                    <td class="px-6 py-4 uppercase">{{ $pkp->npwp }}</td>
                                    <td class="px-6 py-4 uppercase flex gap-2">
                                        <button type="button" data-modal-target="edit-pkp-modal-{{ $pkp->id }}"
                                            data-modal-toggle="edit-pkp-modal-{{ $pkp->id }}"
                                            class="appearance-none py-2 px-3 duration-700 hover:bg-green-600 text-green-600 hover:text-white border rounded-lg border-green-600 hover:border-grey-dark ">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.pembeli.destroy', $pkp->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $pkp->id }}">
                                            <button type="submit"
                                                class="appearance-none py-2 px-3 duration-700 hover:bg-red-600 text-red-600 hover:text-white border rounded-lg border-red-600 hover:border-grey-dark ">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div id="edit-pkp-modal-{{ $pkp->id }}" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-hide="edit-pkp-modal-{{ $pkp->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                    Edit Data PBKP</h3>
                                                <form class="space-y-6"
                                                    action="{{ route('admin.pembeli.update', $pkp->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="flex gap-2">
                                                        <div class="w-full">
                                                            <label for="nama"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                            <input type="text" name="nama" id="nama"
                                                                value="{{ $pkp->nama }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-2">
                                                        <div class="w-full">
                                                            <label for="alamat"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                            <input type="text" name="alamat" id="alamat"
                                                                value="{{ $pkp->alamat }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-2">
                                                        <div class="w-full">
                                                            <label for="kota_kab"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kab</label>
                                                            <input type="text" name="kota_kab" id="kota_kab"
                                                                value="{{ $pkp->kota_kab }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-2">
                                                        <div class="w-full">
                                                            <label for="npwp"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                                                            <input type="text" name="npwp" id="npwp"
                                                                value="{{ $pkp->npwp }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="w-full mt-3 text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                        Update Data PBKP
                                                    </button>
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
    <!-- Add Modal -->
    <div id="add-pkp-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="add-pkp-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                        Tambah Data PBKP (Pembeli Kena Pajak)</h3>
                    <form class="space-y-6" action="{{ route('admin.pembeli.store') }}" method="POST">
                        @csrf
                        <div class="flex gap-2">
                            <div class="w-full">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" name="alamat" id="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <label for="kota_kab"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kab</label>
                                <input type="text" name="kota_kab" id="kota_kab"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="w-full">
                                <label for="npwp"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                                <input type="text" name="npwp" id="npwp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Tambah Data PBKP (Pembeli Kena Pajak)
                        </button>
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
@endsection
