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
                {!! $post->body !!}
            </x-clangim.window>

            @endforeach

            <x-clangim.window :item="null">
                {{$posts->links()}}
            </x-clangim.window>

        </div>
    </div>

</x-app-layout>
