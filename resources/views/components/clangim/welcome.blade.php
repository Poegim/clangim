<div class="p-6 sm:px-12 bg-white border-b border-gray-200">
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
                                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                    <td class="p-4">
                                        <div class="text-sm text-gray-900">
                                            <a href="{{route('clan-wars.show', $clanWar->id)}}">
                                                <img class="h-8 w-8 rounded-full object-cover inline"
                                                src="{{ $clanWar->countryFlagURL() }}" alt="{{ $clanWar->enemy_flag }}"
                                                />
                                                {{$clanWar->title}} 
                                            </a>
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
                <div class="rounded-lg bg-gray-200 p-2 mb-2 flex justify-between">
                    <div class="w-1/2">
                        <a href="{{ route('replays.show', $replay->id) }}"
                            class="hover:text-gray-600 focus:text-gray-600"    
                        >{{$replay->title}}</a>
                        
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

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Laracasts</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
            </div>

            <a href="https://laracasts.com">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Start watching Laracasts</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

</div>
