<!DOCTYPE html>
<html x-cloak x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" x-bind:class="{'dark': darkMode}">

<head>
    <style>
        [x-cloak] {
            display: none;
        }

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
    @bukStyles(true)
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased tracking-wide">

    <div :class="{'dark': darkMode === true}">
        <div>
            <x-jet-banner />
            <div class="min-h-screen bg-gray-100 pb-12 dark:text-gray-200 {{config('settings.color4')}}" x-cloak>
                @livewire('navigation-menu')

                <!-- Page Heading -->
                @if (isset($header))
                <header class="bg-white shadow {{config('settings.color1')}}" x-cloak>
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 grid grid-cols-2 ">
                        {{ $header }}

                        <div class="flex justify-end space-x-2">
                            <span class="text-sm text-gray-800 dark:text-gray-400">Light</span>
                            <label for="toggle"
                                class="w-9 h-5 flex items-center bg-gray-300 rounded-full p-1 cursor-pointer duration-300 ease-in-out dark:bg-gray-600">
                                <div
                                    class="toggle-dot bg-white w-4 h-4 rounded-full shadow-md transform duration-300 ease-in-out dark:translate-x-3">
                                </div>
                            </label>
                            <span class="text-sm text-gray-400 dark:text-white">Dark</span>
                            <input id="toggle" type="checkbox" class="hidden" :value="darkMode"
                                @change="darkMode = !darkMode" />
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
            @bukScripts(true)
            @livewireScripts
            @include('cookie-consent::index')
        </div>
    </div>
</body>

</html>
