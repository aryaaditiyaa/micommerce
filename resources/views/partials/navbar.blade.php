@extends('layouts.app')

@section('navbar')
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto" src="{{ asset('img/brand.svg') }}" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto" src="{{ asset('img/brand-with-text.svg') }}" alt="Workflow">
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('home') }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
                            <a href="{{ route('my-transaction') }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Transaction History</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center space-x-10 pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <a href="{{ route('cart.index') }}" class="group -m-2 p-2 flex items-center">
                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <span class="ml-2 text-sm font-medium text-white group-hover:text-indigo-300">{{ \App\Models\Cart::where('user_id', auth()->user()->id)->count() }}</span>
                    </a>
                    <div class="lg:block hidden text-white">
                        <span>Welcome, {{ strtok(auth()->user()->name, " ") }}</span>
                        <span class="px-2">|</span>
                        <a href="{{ route('logout') }}" class="hover:text-red-500">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                   aria-current="page">Home</a>
                <a href="{{ route('logout') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                   aria-current="page">Logout</a>
            </div>
        </div>
    </nav>

    <!-- content -->
    <div class="max-w-7xl mx-auto lg:p-8 p-2 min-h-screen">
        @yield('content')
    </div>
@endsection

@section('js')
    <script>
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector("#mobile-menu");

        btn.addEventListener("click", () => {
            sidebar.classList.toggle("hidden");
        });
    </script>
@endsection
