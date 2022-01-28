<div class="p-2 sm:px-12 bg-white border-b border-gray-200">
    <div class="text-xl tracking-wider">
        <span>
            <x-govicon-tank class="w-12 h-12 text-blue-700 inline" />
        </span>
        <span class="text-lg font-semibold text-gray-600 ml-3">
            Incoming Clan Wars
        </span>
    </div>

    <div class="mt-6 text-gray-500">
        <div class="flex flex-col mt-6 mb-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="p-2 sm:p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Games
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Added by
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($clanWars as $clanWar)
                                    
                                <tr>
                                    <td class="p-2 sm:p-4">
                                        <div class="text-sm text-gray-900 flex justify-between">
                                            
                                            <div>
                                                <img class="w-5 h-5 sm:h-8 sm:w-8 rounded-full object-cover inline"
                                                src="{{ asset('images/country_flags/'.strtolower($teamFlag->value).'.png') }}" alt="{{ $teamFlag->value }}"
                                                />
                                            </div>
                                            <div><a href="{{route('clan-wars.show', $clanWar->id)}}">{{$clanWar->title}}</a> </div>
                                            <div>
                                                <img class="w-5 h-5 sm:h-8 sm:w-8 rounded-full object-cover inline"
                                                src="{{ $clanWar->countryFlagURL() }}" alt="{{ $clanWar->enemy_flag }}"
                                                />
                                            </div>
                                            
                                                
                                                
                                            
                                        </div>
                                        <div class="text-sm text-gray-500"><!-- Somethin here? --></div>
                                    </td>
                                    <td class="px-2 py-4 text-sm text-gray-500">
                                        {{ $clanWar->date() }}
                                    </td>
                                    <td class="px-2 py-4 text-sm text-gray-500">
                                        {{ $clanWar->gamesCount() }}

                                        @can('update', $clanWar)

                                        <a href="{{route('games.edit', $clanWar->id)}}">
                                            <x-clarity-note-edit-line 
                                            class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1"
                                            />
                                        </a>

                                        @endcan
                                    </td>
                                    <td class="px-2 py-4 text-sm text-gray-500">
                                        {{ $clanWar->user->name }}
                                    </td>
                                    
                                </tr>

                                @endforeach

                                <!-- Next line -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-100 bg-opacity-25 grid grid-cols-1 lg:grid-cols-2">

    <div class="p-4 lg:p-12">
        <div class="flex items-center">
            <span>
                <x-clarity-replay-all-line class="w-12 h-12 text-blue-700 inline" />
            </span>
            <span class="text-lg font-semibold text-gray-600 ml-3">
                Last Replays
            </span>
        </div>

        <div class="mt-4 ml-2 lg:ml-14">
            @foreach ($replays as $replay)
                <div class="rounded-lg bg-gray-100 px-2 py-3 mb-2 flex justify-between h-12">
                    <div class="w-1/2">
                        <a href="{{ route('replays.show', $replay->id) }}"
                            class="hover:text-gray-600 focus:text-gray-600"    
                        >{{\Illuminate\Support\Str::limit($replay->title, 22, '...')}}</a>
                        
                    </div>
                    <div class="flex justify-between w-1/2">
                        <div title="Comments" class="ml-2 mr-1 w-1/3">
                            <a href="{{route('replays.show', $replay->id)}}#comments" class="text-sm font-semibold hover:text-gray-600 focus:text-gray-600"
                                >
                                <x-clarity-block-quote-line class="inline w-5 h-5"/>                         
                                {{$replay->comments->count()}}
                            </a>

                        </div>

                        <livewire:replay.home-page-download :replay="$replay" />


                        <div title="Score" class="mr-1 ml-2 w-1/3">
                            <x-clarity-star-line class="inline w-5 h-5 mb-1"/>
                            {{$replay->averageScore}}
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="p-4 lg:p-12">
        <div class="flex items-center">
            <span>
                <x-clarity-users-line class="w-12 h-12 text-blue-700 inline" />
            </span>
            <span class="text-lg font-semibold text-gray-600 ml-3">
                Top Users:
            </span>
        </div>

        <div class="mt-4 ml-2 lg:ml-14">

            @foreach ($topUsers as $topUser)

            <div class="rounded-lg bg-gray-100 p-2 mb-2 h-12">
                <div class="inline text-gray-700 font-semibold tracking-wider ml-4">
                    {{$topUser->points}} PTS
                </div>

                <div class="inline">
                    <img class="h-8 w-8 rounded-full object-cover inline"
                    src="{{ $topUser->profile_photo_url }}" alt="{{ $topUser->name }}"
                    />
                    
                </div>
                
                <div class="inline">
                    <img class="h-8 w-8 rounded-full object-cover inline"
                    src="{{ $topUser->countryFlagURL() }}" alt="{{ $topUser->country }}"
                    />
                </div>

                <div class="inline text-gray-700 tracking-wider">
                    {{$topUser->name}}
                </div>
            </div>
                
            @endforeach
            
        </div>
    </div>

</div>
