<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-400">
            {{ __('Clan War:') }} {{$clanWar->title}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
                <div
                    class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

                    <span class="block lg:inline ">
                        <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
                            src="{{ $clanWar->user->profile_photo_url }}" alt="{{ $clanWar->user->name }}" />
                        <a href="">{{ $clanWar->title }}</a>,
                        <span class="mt-2 block lg:inline text-xs italic">played at:
                            {{$clanWar->date->format('d-m-Y H:i')}}
                        </span>
                    </span>
                    <span class="mt-2 block lg:inline text-xs italic">
                        Added: {{ $clanWar->createdAt() }}, by {{ $clanWar->user->name }}
                    </span>
                </div>

                <div class="px-6 sm:px-12 pb-4 pt-4 clear-both">

                    <div class="my-4">
                        Result:
                        <span class="font-bold">{{$results->finalResult}}</span>
                        ({{$results->wins}} : {{$results->losses}}).
                    </div>

                    <div class="grid lg:grid-cols-2 gap-2 pb-6">
                        @foreach ($clanWar->games as $game)
                        <div class="rounded overflow-hidden shadow-lg mt-4 pb-8 relative">
                            <div class="px-6 bg bg">
                                <div class="mb-4 border-b-1">
                                    <div class="flex justify-between">
                                        <div>
                                            <span class="mt-2 inline text-sm text-gray-500">Type: {{ $game->type() }},
                                                (id:{{$game->id}})</span>
                                            @if ($game->result == 1)
                                            <x-fontisto-smiley class="w-5 h-5 ml-4 text-green-500 mb-1 inline" />
                                            @endif

                                            @if ($game->result == 0)
                                            <x-fontisto-neutral class="w-5 h-5 ml-4 text-red-600 mb-1 inline" />
                                            @endif

                                        </div>

                                    </div>

                                    <div class="text-gray-700 grid grid-cols-3">

                                        <div>
                                            @if ($game->homePlayers != NULL)
                                            @foreach ($game->homePlayers as $homePlayer)
                                            <div class="text-lg">
                                                <img
                                                src="{{asset('images/races/'.$homePlayer->user->race.'.png')}}"
                                                alt="{{$homePlayer->user->race}}"
                                                class="w-6 h-6 rounded-full inline object-cover"
                                                >
                                                <img
                                                src="{{asset('images/country_flags/'.strtolower($homePlayer->user->country).'.png')}}"
                                                alt="{{$homePlayer->user->country}}"
                                                class="w-6 h-6 rounded-full inline"
                                                >
                                                {{ $homePlayer->user->name}}
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="text-center">vs</div>
                                        <div>
                                            @if ($game->enemyPlayers != NULL)
                                            @foreach ($game->enemyPlayers as $enemyPlayer)
                                            <div class="text-lg">
                                                {{ $enemyPlayer->name}}
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="pl-4  tracking-widest text-xs py-2 absolute bottom-0 w-full bg-gradient-to-r {{$game->result == 1 ? 'from-green-400' : 'from-red-400'}}">
                                @if($game->result == 1)
                                WIN
                                @else
                                LOSE
                                @endif
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
