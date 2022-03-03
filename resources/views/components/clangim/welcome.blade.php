<div class="sm:rounded-lg bg-white border-b border-gray-200 {{config('settings.color1')}} dark:border-none pb-1">

    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="px-0 lg:px-8">
            @if ($clanWars->count())
            <x-clangim.window :item="NULL">

                <div class="pb-2 pl-1 mt-1">
                    <span class="tracking-wider font-bold text-2xl dark:text-gray-200">
                        INCOMING CLAN WARS
                    </span>
                </div>

                <div class="sm:rounded-lg overflow-hidden dark:shadow-lg">
                    <div class="grid grid-cols-3 sm:rounded-lg {{config('settings.color4')}} dark:text-gray-300">
                        @foreach ($clanWars as $clanWar)

                        <div class="flex justify-between pt-2 px-2 col-span-3">
                            <img class="h-5 w-5 rounded-full object-cover inline mr-2"
                            src="{{ asset('images/country_flags/'.strtolower($teamFlag).'.png') }}"
                            alt="{{ $teamFlag }}" />
                            <a href="{{route('clan-wars.show', $clanWar->id)}}"
                                class="font-semibold hover:text-gray-600 focus:text-gray-600 dark:text-gray-200 dark:hover:text-gray-300 dark:focus:text-gray-300">

                                {{$clanWar->title}}
                            </a>
                            <img class="h-5 w-5 rounded-full object-cover inline ml-2"
                            src="{{ $clanWar->countryFlagURL() }}" alt="{{ $clanWar->enemy_flag }}" />

                        </div>

                        <div class="col-span-3 text-center text-sm px-2 border-b border-gray-200 dark:border-gray-800">{{$clanWar->date()}}</div>

                        @endforeach

                    </div>
                </div>

            </x-clangim.window>
            @endif

        </div>

        <div class="@if(!$clanWars->count()) col-span-2 @endif">
            <livewire:team.team-stats-table :players='$topPlayers' />
        </div>

    </div>

    <div class="sm:rounded bg-gray-100 mt-12 bg-opacity-25 grid grid-cols-1 lg:grid-cols-2 mb-10 {{config('settings.color1')}}">

        <div class="py-2 px-0 sm:px-8">
            <div class="flex items-center">
                <span>
                    <x-clarity-replay-all-line class="w-12 h-12 text-blue-700 inline" />
                </span>
                <span class="text-lg font-semibold text-gray-600 ml-3 dark:text-gray-200">
                    Last Replays
                </span>
            </div>

            <div class="mt-4 ml-0 lg:ml-14">
                @foreach ($replays as $replay)
                <div class="sm:rounded-lg bg-gray-100 pl-2 sm:pl-6 pr-2 py-3 mb-2 flex justify-between h-12 {{config('settings.color3')}} dark:text-gray-300">
                    <div class="w-1/2 flex">
                        <a href="{{ route('replays.show', $replay->id) }}"
                            class="font-semibold hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-200 dark:focus:text-gray-200">
                            {{\Illuminate\Support\Str::limit($replay->title, 15, '...')}}
                        </a>

                    </div>
                    <div class="flex justify-between w-1/2">
                        <div title="Comments" class="mr-1 w-1/3">
                            <a href="{{route('replays.show', $replay->id)}}#comments"
                                class="font-semibold hover:text-gray-600 focus:text-gray-600 dark:hover:text-gray-200 dark:focus:text-gray-200">
                                <x-clarity-block-quote-line class="inline-flex w-5 h-5" />
                                {{$replay->comments_count}}
                            </a>
                        </div>

                        <livewire:replay.home-page-download :replay="$replay" />


                        <div title="Score" class="mr-1 w-1/3 flex">
                            <x-clarity-star-line class="inline w-5 h-5 mb-1 mr-1" />
                            {{$replay->averageScore()}}
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="py-2 px-0 sm:px-8">
            <div class="flex items-center">
                <span>
                    <x-clarity-users-line class="w-12 h-12 text-blue-700 inline" />
                </span>
                <span class="text-lg font-semibold text-gray-600 ml-3 dark:text-gray-200">
                    Top Users:
                </span>
            </div>

            <div class="mt-4 ml-0 lg:ml-14">

                @foreach ($topUsers as $topUser)

                <div class="sm:rounded-lg bg-gray-100 p-2 sm:pl-6 mb-2 h-12 text-gray-700 {{config('settings.color3')}} dark:text-gray-300 flex justify-between space-x-2">
                    <div>
                        <div class="inline">
                            <img class="h-8 w-8 rounded-full object-cover inline" src="{{ $topUser->profile_photo_url }}"
                                alt="{{ $topUser->name }}" />


                            <img class="h-8 w-8 rounded-full object-cover inline" src="{{ $topUser->countryFlagURL() }}"
                                alt="{{ $topUser->country }}" />
                        </div>

                        <div class="inline tracking-wider text-gray-900 dark:text-gray-100">
                            {{$topUser->name}}
                        </div>
                    </div>

                    <div class="inline font-semibold tracking-wider ml-0 sm:ml-4 col-span-2">
                        {{$topUser->points}} PTS
                    </div>
                </div>

                @endforeach

            </div>
        </div>

    </div>
