<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div class="pt-12 {{config('settings.color4')}}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
            class="bg-white overflow-hidden shadow-xl sm:rounded-lg bg-transparent">

                <x-clangim.welcome
                :clanWars="$clanWars"
                :replays="$replays"
                :topUsers="$topUsers"
                :teamFlag="$teamFlag"
                :topPlayers="$topPlayers"
                />
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach ($posts as $post)

            <x-clangim.window :item="$post">
                <div class="px-2 sm:px-0">
                    {!! $post->body !!}
                </div>
            </x-clangim.window>

            @endforeach

            @if ($posts->hasPages())
            <x-clangim.window :item="null">

                {{$posts->links()}}

            </x-clangim.window>
            @endif


        </div>
    </div>

</x-app-layout>
