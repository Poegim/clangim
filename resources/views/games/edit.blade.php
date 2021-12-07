<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit games of: ') }} {{ $clanWar->title }}.
        </h2>
    </x-slot>

    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show"
        x-init="setTimeout(() => show = false, 3000)" />

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
                <div
                    class="py-4 px-6 sm:px-20 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

                    <span class="block lg:inline ">
                        <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
                            src="{{ $clanWar->user->profile_photo_url }}" alt="{{ $clanWar->user->name }}" />
                        <a href="">{{ $clanWar->title }}</a>
                    </span>
                    <span class="mt-2 block lg:inline text-xs italic">
                        {{ $clanWar->createdAt() }}, by {{ $clanWar->user->name }}
                    </span>
                </div>

                <div class="px-6 sm:px-20 pb-4 pt-4 clear-both">
                    
                    <livewire:game.game :clanWar="$clanWar">

                </div>
            </div>
        </div>
    </div>

</x-app-layout>