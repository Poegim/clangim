<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <x-clangim.window :item="NULL">

        <div class="pb-2 pl-1">
            <span class="tracking-widest text-lg">
                {{$title}}
            </span>
        </div>

        <table class="min-w-full divide-y divide-gray-200 table-fixed">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium tracking-wider text-gray-500 uppercase cursor-pointer w-2/5"
                        wire:click='sortTable("name")'>

                        Player
                        <div class="inline {{$tableSortedBy!= 'name' ? 'text-gray-50' : 'text-black'}}">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>

                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-right text-xs font-medium tracking-wider text-gray-500 uppercase h-4 cursor-pointer"
                        wire:click='sortTable("wins")'>
                        Wins
                        <div class="inline {{$tableSortedBy!= 'wins' ? 'text-gray-50' : 'text-black'}}">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-right text-xs font-medium tracking-wider text-gray-500 uppercase cursor-pointer"
                        wire:click='sortTable("losses")'>
                        Losses
                        <div class="inline {{$tableSortedBy!= 'losses' ? 'text-gray-50' : 'text-black'}}">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-right text-xs font-medium tracking-wider text-gray-500 uppercase cursor-pointer"
                        wire:click='sortTable("games")'>
                        Games
                        <div class="inline {{$tableSortedBy!= 'games' ? 'text-gray-50' : 'text-black'}}">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-right text-xs font-medium tracking-wider text-gray-500 uppercase pr-2">
                        WR%
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($players as $player)

                <tr>
                    <td class="w-2/5 pl-2">{{$player->name}}</td>
                    <td class="text-right">{{$player->wins}}</td>
                    <td class="text-right">{{$player->losses}}</td>
                    <td class="text-right">{{$player->games}}</td>
                    <td class="text-right pr-2">
                        {{ $player->games != 0 ? number_format((($player->wins / $player->games)*100),2) : '' }}
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </x-clangim.window>

</div>
