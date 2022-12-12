<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">

</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

</div>
</div>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>

<script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</head>


<body>
<div class="bg-white shadow-md" x-data="{ isOpen: false }">
<nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
<div class="flex items-center justify-between">
<a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
    href="#">
    T&EFood
</a>
<!-- Mobile menu button -->
<div @click="isOpen = !isOpen" class="flex md:hidden">
    <button type="button"
        class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
        aria-label="toggle menu">
        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
            <path fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
            </path>
        </svg>
    </button>
</div>
</div>

<!-- Mobile Menu open: "block", Menu closed: "hidden" -->
<div :class="isOpen ? 'flex' : 'hidden'"
class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
<a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
    href="/">Home</a>
<a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
    href="{{ route('categories.index') }}">Categories</a>
<a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
    href="{{ route('menus.index') }}">Our Menu</a>
<a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
    href="{{ route('reservations.step.one') }}">Make Reservation</a>
    
</div>
</nav>
</div>
<div class="container w-full px-5 py-6 mx-auto">
<div class="flex items-center min-h-screen bg-gray-50">
<div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
<div class="flex flex-col md:flex-row">
    <div class="h-32 md:h-auto md:w-1/2">
        <img class="object-cover w-full h-full"
            src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>

            <div class="w-full bg-gray-200 rounded-full">
                <div
                    class="w-40 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                    Step1</div>
            </div>

            <form method="POST" action="{{ route('reservations.store.step.one') }}">
                @csrf
                <div class="sm:col-span-6">
                    <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name
                    </label>
                    <div class="mt-1">
                        <input type="text" id="first_name" name="first_name"
                            value="{{ $reservation->first_name ?? '' }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('first_name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name
                    </label>
                    <div class="mt-1">
                        <input type="text" id="last_name" name="last_name"
                            value="{{ $reservation->last_name ?? '' }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('last_name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                    <div class="mt-1">
                        <input type="email" id="email" name="email"
                            value="{{ $reservation->email ?? '' }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('email')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="tel_number" class="block text-sm font-medium text-gray-700"> Phone
                        number
                    </label>
                    <div class="mt-1">
                        <input type="text" id="tel_number" name="tel_number"
                            value="{{ $reservation->tel_number ?? '' }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('tel_number')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation
                        Date
                    </label>
                    <div class="mt-1">
                        <input type="datetime-local" id="res_date" name="res_date"
                            min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                            max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                            value="{{ $reservation ? $reservation->res_date->format('Y-m-d\TH:i:s') : '' }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    <span class="text-xs">Please choose the time between 14:00-23:00.</span>
                    @error('res_date')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest
                        Number
                    </label>
                    <div class="mt-1">
                        <input type="number" id="guest_number" name="guest_number"
                            value="{{ $reservation->guest_number ?? '' }}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('guest_number')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 p-4 flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

    </div>
    <footer class="bg-gray-800 border-t border-gray-200">
<div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
    <div class="flex flex-wrap justify-center">
        <ul class="flex items-center space-x-4 text-white">
            <li>Home</li>
            <li>About</li>
            <li>Contact</li>
            <li>Terms</li>
        </ul>
    </div>
    <div class="flex justify-center mt-4 lg:mt-0">
        <a>
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-6 h-6 text-blue-600" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
        </a>
        <a class="ml-3">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-6 h-6 text-blue-300" viewBox="0 0 24 24">
                <path
                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                </path>
            </svg>
        </a>
        <a class="ml-3">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" class="w-6 h-6 text-pink-400" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>
        </a>
        <a class="ml-3">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="0" class="w-6 h-6 text-blue-500" viewBox="0 0 24 24">
                <path stroke="none"
                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                </path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
        </a>
    </div>
</div>
</footer>
</body>

</html>
</x-app-layout>