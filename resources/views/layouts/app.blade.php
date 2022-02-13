<!DOCTYPE html>
<html
    x-cloak
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{'dark': darkMode}"
    >

<head>
    <style>
        [x-cloak] { display: none; }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @bukStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/clangim.js') }}"></script>


</head>

<body class="font-sans antialiased tracking-wide">

    <div>
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 pb-12 dark:text-gray-200 dark:bg-black" x-cloak>
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow dark:bg-black" x-cloak>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 grid grid-cols-2 ">
                    {{ $header }}
                    <div class="flex justify-end">
                        <button x-cloak x-on:click="darkMode = !darkMode;" >
                            <span x-show="!darkMode" class="text-gray-600">
                                Switch to dark <x-clarity-moon-line class="inline p-2 ml-3 w-8 h-8 text-gray-700 bg-gray-100 rounded-md transition duration-300 cursor-pointer hover:bg-gray-200" />
                            </span>
                            <span x-show="darkMode" class="text-gray-400">
                                Switch to light <x-clarity-sun-line class="inline p-2 ml-3 w-8 h-8 text-gray-100 bg-gray-700 rounded-md transition duration-300 cursor-pointer dark:hover:bg-gray-600" />
                            </span>
                        </button>
                    </div>

                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @include('layouts.footer')
        @stack('modals')
        @livewireScripts
        @bukScripts
        @include('cookie-consent::index')
    </div>
</body>

</html>
