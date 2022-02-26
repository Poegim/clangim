<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Clan War:') }} {{$clanWar->title}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg mt-12 {{config('settings.color2')}} dark:text-white">
                <div
                    class="py-4 px-2 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold {{config('settings.color1')}} dark:text-gray-300 dark:border-gray-700">

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

                <div class="px-2 sm:px-12 pb-4 pt-4 clear-both">

                    <div class="my-4">
                        Result:
                        <span class="font-bold">{{$results->finalResult}}</span>
                        ({{$results->wins}} : {{$results->losses}}).
                    </div>

                    <div class="grid lg:grid-cols-2 gap-2 pb-6">
                        @foreach ($clanWar->games as $game)
                        <div class="rounded overflow-hidden shadow-lg mt-4 pb-8 relative {{config('settings.color3')}}">
                            <div class="px-6">
                                <div class="mb-4 border-b-1">
                                    <div class="flex justify-between">
                                        <div class="pt-2">
                                            <span class="mt-2 inline text-sm text-gray-600 dark:text-gray-300">Type: {{ $game->type() }},
                                                (id:{{$game->id}})</span>
                                            @if ($game->result == 1)
                                            <x-fontisto-smiley class="w-5 h-5 ml-4 text-green-500 mb-1 inline" />
                                            @endif

                                            @if ($game->result == 0)
                                            <x-fontisto-neutral class="w-5 h-5 ml-4 text-red-600 mb-1 inline" />
                                            @endif

                                        </div>

                                    </div>

                                    <div class="text-gray-700 grid grid-cols-7 dark:text-gray-200">
                                        <div class="col-span-3">
                                            @if ($game->homePlayers != NULL)
                                            @foreach ($game->homePlayers as $homePlayer)
                                            <div class="text-md">
                                                <img
                                                src="{{asset('images/races/'.$homePlayer->user->race.'.png')}}"
                                                alt="{{$homePlayer->user->race}}"
                                                class="w-6 h-6 inline object-cover"
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
                                        <div class="col-span-3">
                                            @if ($game->enemyPlayers != NULL)
                                            @foreach ($game->enemyPlayers as $enemyPlayer)
                                            <div class="text-md w-full h-6">
                                                {{ $enemyPlayer->name}}
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="pl-4  tracking-widest text-xs py-2 absolute bottom-0 w-full bg-gradient-to-r {{$game->result == 1 ? 'from-green-400 dark:to-indigo-900' : 'from-red-400 dark:to-indigo-900'}}">
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
