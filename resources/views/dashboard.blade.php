<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-notification></x-notification>
    
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-clangim.welcome :clanWars="$clanWars" :replays="$replays" :topUsers="$topUsers"/>
            </div>
        </div>
    </div>

    @include('layouts.blog')

</x-app-layout>
