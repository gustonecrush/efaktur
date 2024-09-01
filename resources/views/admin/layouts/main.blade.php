<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class=" bg-grey-lighter flex flex-col min-h-screen w-full">
        <div>
            <div class="bg-primary">
                <div class="container mx-auto px-4">
                    <div class="flex items-center md:justify-between py-4">
                        <div class="w-1/4 md:hidden">
                            <svg class="fill-current text-white h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z" />
                            </svg>
                        </div>
                        <div class="w-1/2 md:w-auto text-center text-white text-2xl font-medium">
                            Dashboard CV Sayovi Karyatama
                        </div>
                        <div class="w-1/4 md:w-auto md:flex text-right">
                            <div>
                                <img class="inline-block h-8 w-8 rounded-full"
                                    src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                            </div>
                            <div class="hidden md:block md:flex md:items-center ml-2">
                                <span class="text-white text-sm mr-1">{{ Auth::guard('admin')->user()->name }}</span>
                                <div>
                                    <svg class="fill-current text-white h-4 w-4 block opacity-50"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502a1.095 1.095 0 0 1-1.576 0S4.924 9.581 4.516 9.163c-.409-.418-.436-1.17 0-1.615z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden bg-white md:block  md:border-b">
                <div class="container mx-auto px-4">
                    <div class="md:flex">
                        @if (Auth::guard('admin')->user()->role != 'Karyawan')
                            <div class="flex -mb-px mr-8">
                                <a href="{{ route('admin.faktur') }}"
                                    class="no-underline text-primary opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4    hover:opacity-100 md:hover:border-grey-dark @if ($active == 'Faktur Pajak') border-b border-primary @endif">
                                    <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <path d="M8 7h10V5l4 3.5-4 3.5v-2H8V7zm-6 8.5L6 12v2h10v3H6v2l-4-3.5z"
                                            fill-rule="nonzero" />
                                    </svg> Faktur Pajak
                                </a>
                            </div>
                        @endif

                        @if (Auth::guard('admin')->user()->role == 'Karyawan')
                            <div class="flex -mb-px mr-8">
                                <a href="{{ route('admin.pengusaha') }}"
                                    class="no-underline text-primary opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 gap-2   hover:opacity-100 md:hover:border-grey-dark @if ($active == 'Pengusaha Kena Pajak') border-b border-primary @endif">
                                    <i class='bx bxs-briefcase-alt-2 text-xl'></i> Pengusaha Kena Pajak
                                </a>
                            </div>
                            <div class="flex -mb-px mr-8">
                                <a href="{{ route('admin.pembeli') }}"
                                    class="no-underline text-primary opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4  gap-2  hover:opacity-100 md:hover:border-grey-dark @if ($active == 'Pembeli Kena Pajak') border-b border-primary @endif">
                                    <i class='bx bxs-cart-alt text-2xl'></i> Pembeli Kena Pajak
                                </a>
                            </div>
                        @endif


                        {{-- <div class="flex -mb-px mr-8">
                            <a href="{{ route('admin.invoicePage') }}"
                                class="no-underline text-primary opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 hover:opacity-100 md:hover:border-grey-dark @if ($active == 'Faktur') border-b border-primary @endif">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M18 8H5.5v-.5l11-.88v.88H18V6c0-1.1-.891-1.872-1.979-1.717L5.98 5.717C4.891 5.873 4 6.9 4 8v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-1.5 7.006a1.5 1.5 0 1 1 .001-3.001 1.5 1.5 0 0 1-.001 3.001z"
                                        fill-rule="nonzero" />
                                </svg> Faktur Masuk
                            </a>
                        </div> --}}
                        {{-- <div class="flex -mb-px mr-8">
                            <a href="{{ route('admin.notaPage') }}"
                                class="no-underline text-primary opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 hover:opacity-100 md:hover:border-grey-dark gap-2 @if ($active == 'Nota Jalan') border-b border-primary @endif">
                                <i class='bx bxs-car text-lg'></i> <span>Faktur Keluar</span>
                            </a>
                        </div> --}}
                        {{-- <div class="flex -mb-px mr-8">
                            <a href="{{ route('admin.barangPage') }}"
                                class="no-underline text-primary opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 @if ($active == 'Barang') border-b border-primary @endif hover:opacity-100 md:hover:border-grey-dark">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M11 12h2v2h9s-.149-4.459-.2-5.854C21.75 6.82 21.275 6 19.8 6h-3.208l-1.197-2.256C15.064 3.121 14.951 3 14.216 3H9.783c-.735 0-.847.121-1.179.744-.165.311-.7 1.318-1.196 2.256H4.199c-1.476 0-1.945.82-2 2.146C2.145 9.473 2 14 2 14h9v-2zM9.649 4.916c.23-.432.308-.516.817-.516h3.067c.509 0 .588.084.816.516L14.924 6h-5.85l.575-1.084zM13 17h-2v-2H2.5s.124 1.797.199 3.322c.031.633.218 1.678 1.8 1.678H19.5c1.582 0 1.765-1.047 1.8-1.678.087-1.568.2-3.322.2-3.322H13v2z"
                                        fill-rule="nonzero" />
                                </svg> Barang
                            </a>
                        </div> --}}
                        <div class="flex -mb-px">
                            <form action="{{ route('admin.logout') }}" method="post">
                                @csrf
                                <button
                                    class="no-underline text-primary opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-grey-dark">
                                    <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M18.783 12c0-1.049.646-1.875 1.617-2.443a8.932 8.932 0 0 0-.692-1.672c-1.089.285-1.97-.141-2.711-.883-.741-.74-.968-1.621-.683-2.711a8.732 8.732 0 0 0-1.672-.691c-.568.97-1.595 1.615-2.642 1.615-1.048 0-2.074-.645-2.643-1.615-.58.172-1.14.403-1.671.691.285 1.09.059 1.971-.684 2.711-.74.742-1.621 1.168-2.711.883A8.797 8.797 0 0 0 3.6 9.557c.97.568 1.615 1.394 1.615 2.443 0 1.047-.645 2.074-1.615 2.643.173.58.404 1.14.691 1.672 1.09-.285 1.971-.059 2.711.682.741.742.969 1.623.684 2.711.532.288 1.092.52 1.672.693.568-.973 1.595-1.617 2.643-1.617 1.047 0 2.074.645 2.643 1.617a8.963 8.963 0 0 0 1.672-.693c-.285-1.088-.059-1.969.683-2.711.741-.74 1.622-1.166 2.711-.883.287-.532.52-1.092.692-1.672-.973-.569-1.619-1.395-1.619-2.442zM12 15.652a3.653 3.653 0 1 1 0-7.306 3.653 3.653 0 0 1 0 7.306z"
                                            fill-rule="nonzero" />
                                    </svg> Log Out
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

</body>

</html>
