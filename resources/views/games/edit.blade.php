<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Edit games of: ') }} {{ $clanWar->title }}.
        </h2>
    </x-slot>


    <div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12 {{config('settings.color2')}} dark:text-white">
                <div
                    class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold {{config('settings.color1')}} dark:text-gray-300 dark:border-gray-700">

                    <span class="block lg:inline ">
                        <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
                            src="{{ $clanWar->user->profile_photo_url }}" alt="{{ $clanWar->user->name }}" />
                        <a href="">{{ $clanWar->title }}</a>
                    </span>
                    <span class="mt-2 block lg:inline text-xs italic">
                        {{ $clanWar->createdAt() }}, by {{ $clanWar->user->name }}
                    </span>
                </div>

                <div class="px-2 sm:px-12 pb-4 pt-4">

                    <livewire:game.game :clanWar="$clanWar">

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
