<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($replay->title) }}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
                <div
                    class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

                    <span class="block lg:inline ">
                        <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
                            src="{{ $replay->user->profile_photo_url }}" alt="{{ $replay->user->name }}" />
                        <span><a href="{{route('replays.show', $replay->id)}}">{{ $replay->title }}</a></span>
                    </span>
                    <span class="mt-2 block lg:inline text-xs italic">
                        {{ $replay->createdAt() }}, by {{ $replay->user->name }}
                    </span>
                </div>

                <div class="py-4 px-6 sm:px-12">
                    <livewire:replay.score :passedId="$replay->id" />
                </div>

                <x-clangim.replays.replay :replay="$replay" />

            </div>

            @foreach ($replay->comments as $comment)
            <x-clangim.replays.comment :comment="$comment" />
            @endforeach

            <x-clangim.replays.addComment :replayId="$replay->id" />


        </div>
    </div>
</x-app-layout>
