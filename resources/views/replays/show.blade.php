<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-400">
            {{ __($replay->title) }}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12 dark:bg-indigo-900 dark:text-white">
                <div
                    class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700">

                    <div class="relative">

                        <div class="inline absolute z-20">
                            <img class="h-8 w-8 rounded-full object-cover inline"
                            src="{{ $replay->user->profile_photo_url }}" alt="{{ $replay->user->name }}"
                            />

                        </div>

                        <div class="inline left-5 z-10 absolute">
                            <img class="h-8 w-8 rounded-full object-cover inline"
                            src="{{ $replay->user->countryFlagURL() }}" alt="{{ $replay->user->country }}"
                            />
                        </div>

                        <div class="ml-14 h-full mt-1">
                            {{$replay->title}}</span>
                        </div>
                    </div>
                    <span class="mt-2 block lg:inline text-xs italic">
                        {{ $replay->createdAt() }}, by {{ $replay->user->name }}
                    </span>
                </div>

                <div class="py-4 px-6 sm:px-12">
                    <livewire:replay.score :passedId="$replay->id" />
                </div>

                <x-clangim.replays.replay :replay="$replay" />

            </div>

            <span id="comments"></span>

            @foreach ($replay->comments as $comment)

            <x-clangim.window :item="$comment">
                {!!$comment->body!!}
            </x-clangim.window>

            @endforeach

            <x-clangim.replays.addComment :replayId="$replay->id" />


        </div>
    </div>
</x-app-layout>
