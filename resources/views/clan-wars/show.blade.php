<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clan War:') }} {{$clanWar->title}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
                <div
                    class="py-4 px-6 sm:px-20 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

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

                <div class="px-6 sm:px-20 pb-4 pt-4 clear-both">

                    <div class="my-4">
                        Result: {{$results->finalResult}} ({{$results->wins}} : {{$results->losses}}).
                    </div>

                    @foreach ($clanWar->games as $game)
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
                            @switch($game->type())
                            @case('1v1')
                            <div>
                                @if ($game->homePlayerOne != NULL)
                                {{ $game->homePlayerOne->name }}
                                @endif
                            </div>
                            <div class="text-center">vs</div>
                            <div>
                                @if ($game->enemy_player_1 != NULL)
                                {{ $game->enemy_player_1 }}
                                @endif
                            </div>
                            @break

                            @case('2v2')
                            <div>
                                @if ($game->homePlayerOne != NULL)
                                {{ $game->homePlayerOne->name }}
                                @endif
                            </div>
                            <div class="text-center">vs</div>
                            <div>
                                @if ($game->enemy_player_1 != NULL)
                                {{ $game->enemy_player_1 }}
                                @endif
                            </div>

                            <div>
                                @if ($game->homePlayerTwo != NULL)
                                {{ $game->homePlayerTwo->name }}
                                @endif
                            </div>
                            <div class="text-center"></div>
                            <div>
                                @if ($game->enemy_player_2 != NULL)
                                {{ $game->enemy_player_2 }}
                                @endif
                            </div>
                            @break

                            @case('3v3')
                            <div>
                                @if ($game->homePlayerOne != NULL)
                                {{ $game->homePlayerOne->name }}
                                @endif
                            </div>
                            <div class="text-center">vs</div>
                            <div>
                                @if ($game->enemy_player_1 != NULL)
                                {{ $game->enemy_player_1 }}
                                @endif
                            </div>

                            <div>
                                @if ($game->homePlayerTwo != NULL)
                                {{ $game->homePlayerTwo->name }}
                                @endif
                            </div>
                            <div class="text-center"></div>
                            <div>
                                @if ($game->enemy_player_2 != NULL)
                                {{ $game->enemy_player_2 }}
                                @endif
                            </div>

                            <div>
                                @if ($game->homePlayerThree != NULL)
                                {{ $game->homePlayerThree->name }}
                                @endif
                            </div>
                            <div class="text-center"></div>
                            <div>
                                @if ($game->enemy_player_3 != NULL)
                                {{ $game->enemy_player_3 }}
                                @endif
                            </div>
                            @break

                            @case('4v4')
                            <div>
                                @if ($game->homePlayerOne != NULL)
                                {{ $game->homePlayerOne->name }}
                                @endif
                            </div>
                            <div class="text-center">vs</div>
                            <div>
                                @if ($game->enemy_player_1 != NULL)
                                {{ $game->enemy_player_1 }}
                                @endif
                            </div>

                            <div>
                                @if ($game->homePlayerTwo != NULL)
                                {{ $game->homePlayerTwo->name }}
                                @endif
                            </div>
                            <div class="text-center"></div>
                            <div>
                                @if ($game->enemy_player_2 != NULL)
                                {{ $game->enemy_player_2 }}
                                @endif
                            </div>

                            <div>
                                @if ($game->homePlayerThree != NULL)
                                {{ $game->homePlayerThree->name }}
                                @endif
                            </div>
                            <div class="text-center"></div>
                            <div>
                                @if ($game->enemy_player_3 != NULL)
                                {{ $game->enemy_player_3 }}
                                @endif
                            </div>

                            <div>
                                @if ($game->homePlayerFour != NULL)
                                {{ $game->homePlayerFour->name }}
                                @endif
                            </div>
                            <div class="text-center"></div>
                            <div>
                                @if ($game->enemy_player_4 != NULL)
                                {{ $game->enemy_player_4 }}
                                @endif
                            </div>

                            @break
                            @default

                            @endswitch
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
