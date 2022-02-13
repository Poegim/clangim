<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-400">
            {{ __('Team Settings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="pt-10">

            <livewire:team.settings.logo />
            <livewire:team.settings.country />

        </div>
    </div>


</x-app-layout>
