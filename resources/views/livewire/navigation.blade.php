<div class="relative bg-white shadow-lg" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-200 py-3 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">{{-- Logo of page --}}
                <a href="{{ route('home') }}" class="flex items-center justify-center">
                    <span class="sr-only">WoFit</span>
                    <img class="h-8 w-auto sm:h-10" src="{{ asset('img/favicon.ico') }}" alt="">
                    <span class="ml-1 font-bold text-xl text-gray-900">WoFit</span>
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button" x-on:click="open = true" {{-- Button open click --}}
                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu"
                    aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <nav class="hidden md:flex space-x-10">
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900 border-b-2 hover:border-blue-600">
                    Sugerencias
                </a>
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900 border-b-2 hover:border-blue-600">
                    Nosotros
                </a>
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900 border-b-2 hover:border-blue-600">
                    Contacto
                </a>
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900 border-b-2 hover:border-blue-600">
                    Redes
                </a>
            </nav>
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <a href="{{ route('register') }}"
                    class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                    Registro
                </a>
                <a href="{{ route('login') }}"
                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-1 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Login
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on mobile menu state. -->
    <div x-show="open" x-on:click.away="open = false" class="fixed z-50 top-0 inset-x-0 p-2 transition transform duration-200 ease-in origin-top-right md:hidden">
        <div class="absolute rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="{{ route('home') }}">
                            <img class="h-8 w-auto" src="{{ asset('img/favicon.ico') }}"
                            alt="WoFit">
                        </a>
                    </div>
                    <div class="-mr-2">
                        <button type="button" x-on:click="open = false"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-8">
                        <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 transform duration-100 ease-in">
                            <span class="ml-3 text-base font-medium text-gray-900">
                                Sugerencias
                            </span>
                        </a>

                        <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 transform duration-100 ease-in">
                            <span class="ml-3 text-base font-medium text-gray-900">
                                Nosotros
                            </span>
                        </a>

                        <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 transform duration-100 ease-in">
                            <span class="ml-3 text-base font-medium text-gray-900">
                                Constacto
                            </span>
                        </a>

                        <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 transform duration-100 ease-in">
                            <span class="ml-3 text-base font-medium text-gray-900">
                                Redes
                            </span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="py-6 px-5 space-y-6">
                <div class="flex mx-auto justify-center items-center">
                    <div>
                        <a href="{{ route('login') }}"
                            class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            Login
                        </a>
                        <p class="mt-6 text-center text-base font-medium text-gray-500">
                            A??n no tienes cuenta?
                            <a href="{{ route('register')}}" class="text-indigo-600 hover:text-indigo-500">
                                 Registro
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
