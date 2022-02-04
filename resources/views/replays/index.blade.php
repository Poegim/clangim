<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Replays') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="py-6 px-2 sm:px-12 border-b border-gray-200 bg-white">

                    <div>
                        <x-notification></x-notification>

                        <div>
                            <div class="flex justify-between px-1">

                                <span>
                                    <x-clarity-replay-all-line class="w-16 h-16 text-blue-700 inline" />
                                </span>

                                @can('create', App\Models\Replays\Replay::class)

                                <x-clangim.dark-button-link class="cursor-pointer" href="{{route('replays.create')}}">
                                    Add
                                    Replay
                                </x-clangim.dark-button-link>

                                @endcan
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            @foreach ($replays as $replay)

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
                <div
                    class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

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
                            <a href="{{route('replays.show', $replay->id)}}">{{$replay->title}}</a>
                        </div>
                    </div>
                    <span class="mt-2 block lg:inline text-xs italic">
                        {{ $replay->createdAt() }}, by {{ $replay->user->name }}
                    </span>
                </div>

                <div class="py-4 px-6 sm:px-12">
                        <livewire:replay.score :passedId="$replay->id"/>
                </div>

                <x-clangim.replays.replay :replay="$replay" />

            </div>


            @endforeach

        </div>
    </div>
</x-app-layout>
