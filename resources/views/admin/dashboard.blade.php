@extends('admin.layouts.main', [
    'title' => 'Dashboard E-Faktur CV Sayovi Karyatama',
    'active' => 'Dashboard',
])

@section('content')
    <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
            <div class="border-b px-6">
                <div class="flex justify-between -mb-px">
                    <div class="lg:hidden text-blue-dark py-4 text-lg">
                        Price Charts
                    </div>
                    <div class="hidden lg:flex">
                        <button type="button" class="appearance-none py-4 text-blue-dark border-b border-primary mr-6">
                            Bitcoin &middot; CA$21,404.74
                        </button>
                        <button type="button"
                            class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-6">
                            Ethereum &middot; CA$884.80
                        </button>
                        <button type="button"
                            class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark">
                            Litecoin &middot; CA$358.24
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
                        <span class="text-3xl align-top">CA$</span>
                        <span class="text-5xl">21,404</span>
                        <span class="text-3xl align-top">.74</span>
                    </div>
                    <div class="text-green-light text-sm">
                        &uarr; CA$12,955.35 (154.16%)
                    </div>
                </div>
                <div class="flex-shrink w-32 inline-block relative">
                    <select class="block appearance-none w-full bg-white border border-grey-light px-4 py-2 pr-8 rounded">
                        <option>BTC</option>
                        <option>ETH</option>
                        <option>LTC</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex">
                <div class="w-1/3 text-center py-8">
                    <div class="border-r">
                        <div class="text-grey-darker mb-2">
                            <span class="text-3xl align-top">CA$</span>
                            <span class="text-5xl">21,404</span>
                            <span class="text-3xl align-top">.74</span>
                        </div>
                        <div class="text-sm uppercase text-grey tracking-wide">
                            Bitcoin Price
                        </div>
                    </div>
                </div>
                <div class="w-1/3 text-center py-8">
                    <div class="border-r">
                        <div class="text-grey-darker mb-2">
                            <span class="text-3xl align-top"><span class="text-green align-top">+</span>CA$</span>
                            <span class="text-5xl">12,998</span>
                            <span class="text-3xl align-top">.48</span>
                        </div>
                        <div class="text-sm uppercase text-grey tracking-wide">
                            Since last month (CAD)
                        </div>
                    </div>
                </div>
                <div class="w-1/3 text-center py-8">
                    <div>
                        <div class="text-grey-darker mb-2">
                            <span class="text-3xl align-top"><span class="text-green align-top">+</span></span>
                            <span class="text-5xl">154.47</span>
                            <span class="text-3xl align-top">%</span>
                        </div>
                        <div class="text-sm uppercase text-grey tracking-wide">
                            Since last month (%)
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
                <div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                    <div class="border-b">
                        <div class="flex justify-between px-6 -mb-px">
                            <h3 class="text-blue-dark py-4 font-normal text-lg">Your Portfolio</h3>
                            <div class="flex">
                                <button type="button"
                                    class="appearance-none py-4 text-blue-dark border-b border-primary mr-3">
                                    List
                                </button>
                                <button type="button"
                                    class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark">
                                    Chart
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
                        <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
                            <div class="rounded-full bg-orange inline-flex mr-3">
                                <svg class="fill-current text-white h-8 w-8 block" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32 32">
                                    <g fill-rule="evenodd">
                                        <path
                                            d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <span class="text-lg">Bitcoin</span>
                        </div>
                        <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
                            <div class="bg-orange h-2 rounded-full flex-grow mr-2"></div>
                            100%
                        </div>
                        <div class="flex w-3/5 md:w/12">
                            <div class="w-1/2 px-4">
                                <div class="text-right">
                                    0.0010 BTC
                                </div>
                            </div>
                            <div class="w-1/2 px-4">
                                <div class="text-right text-grey">
                                    CA$21.28
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
                        <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
                            <div class="rounded-full bg-grey inline-flex mr-3">
                                <svg class="fill-current text-white h-8 w-8 block" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 38 38">
                                    <g fill-rule="evenodd">
                                        <path
                                            d="M12.29 28.04l1.29-5.52-1.58.67.63-2.85 1.64-.68L16.52 10h5.23l-1.52 7.14 2.09-.74-.58 2.7-2.05.8-.9 4.34h8.1l-.99 3.8z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <span class="text-lg">Litecoin</span>
                        </div>
                        <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
                            <div class="bg-grey h-2 w-2 rounded-full mr-2"></div>
                            0%
                        </div>
                        <div class="flex w-3/5 md:w/12">
                            <div class="w-1/2 px-4">
                                <div class="text-right">
                                    0.0000 LTC
                                </div>
                            </div>
                            <div class="w-1/2 px-4">
                                <div class="text-right text-grey">
                                    CA$0.00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
                        <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
                            <div class="rounded-full bg-indigo inline-flex mr-3">
                                <svg class="fill-current text-white h-8 w-8 block" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32 32">
                                    <g fill-rule="evenodd">
                                        <path
                                            d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <span class="text-lg">Ethereum</span>
                        </div>
                        <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
                            <div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>
                            0%
                        </div>
                        <div class="flex w-3/5 md:w/12">
                            <div class="w-1/2 px-4">
                                <div class="text-right">
                                    0.0000 ETH
                                </div>
                            </div>
                            <div class="w-1/2 px-4">
                                <div class="text-right text-grey">
                                    CA$0.00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="text-center text-grey">
                            Total Balance &asymp; CA$21.28
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 px-4">
                <div class="bg-white border-t border-b sm:rounded sm:border shadow">
                    <div class="border-b">
                        <div class="flex justify-between px-6 -mb-px">
                            <h3 class="text-blue-dark py-4 font-normal text-lg">Recent Activity</h3>
                        </div>
                    </div>
                    <div>
                        <div class="text-center px-6 py-4">
                            <div class="py-8">
                                <div class="mb-4">
                                    <svg class="inline-block fill-current text-grey h-16 w-16"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M11.933 13.069s7.059-5.094 6.276-10.924a.465.465 0 0 0-.112-.268.436.436 0 0 0-.263-.115C12.137.961 7.16 8.184 7.16 8.184c-4.318-.517-4.004.344-5.974 5.076-.377.902.234 1.213.904.959l2.148-.811 2.59 2.648-.793 2.199c-.248.686.055 1.311.938.926 4.624-2.016 5.466-1.694 4.96-6.112zm1.009-5.916a1.594 1.594 0 0 1 0-2.217 1.509 1.509 0 0 1 2.166 0 1.594 1.594 0 0 1 0 2.217 1.509 1.509 0 0 1-2.166 0z" />
                                    </svg>
                                </div>
                                <p class="text-2xl text-grey-darker font-medium mb-4">No buys or sells yet</p>
                                <p class="text-grey max-w-xs mx-auto mb-6">You've successfully linked a payment
                                    method and can start buying digital currency.</p>
                                <div>
                                    <button type="button"
                                        class="bg-blue hover:bg-blue-dark text-white border border-primary rounded px-6 py-4">Buy
                                        now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white border-t">
        <div class="container mx-auto px-4">
            <div class="md:flex justify-between items-center text-sm">
                <div class="text-center md:text-left py-3 md:py-4 border-b md:border-b-0">
                    <a href="#" class="no-underline text-grey-dark mr-4">Home</a>
                    <a href="#" class="no-underline text-grey-dark mr-4">Careers</a>
                    <a href="#" class="no-underline text-grey-dark">Legal &amp; Privacy</a>
                </div>
                <div class="md:flex md:flex-row-reverse items-center py-4">
                    <div class="text-center mb-4 md:mb-0 md:flex">
                        <div class="w-48 inline-block relative mb-4 md:mb-0 md:mr-4">
                            <select
                                class="leading-tight block appearance-none w-full bg-white border border-grey-light px-3 py-2 pr-8 rounded">
                                <option>English</option>
                            </select>
                            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <a href="#"
                                class="inline-block leading-tight bg-blue border border-primary hover:bg-blue-dark px-3 py-2 text-white no-underline rounded">Need
                                help?</a>
                        </div>
                    </div>
                    <div class="text-grey text-center md:mr-4">&copy; 2017 Cointoad</div>
                </div>
            </div>
        </div>
    </div>
@endsection
