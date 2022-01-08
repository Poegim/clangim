<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($replay->title) }}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            

            <x-clangim.replays.replay :replay="$replay" />

            @foreach ($replay->comments as $comment)
                <x-clangim.replays.comment :comment="$comment" />
            @endforeach

            <x-clangim.replays.addComment :replayId="$replay->id" />
            

        </div>
    </div>
</x-app-layout>
