<div class="max-w-7xl mx-auto px-0 lg:px-8">

    <x-clangim.window :item="NULL">

        <div class="pb-2 pl-1">
            <span class="tracking-wider font-bold text-2xl dark:text-gray-200">
                {{strtoupper($title)}}
            </span>
        </div>

        <div class="rounded-lg overflow-hidden dark:shadow-lg">
        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-none">
            <thead class="bg-gray-50 dark:bg-purple-800 dark:text-gray-300">
                <tr>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium tracking-wider uppercase cursor-pointer w-2/5 focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900"
                        wire:click='sortTable("name")'>

                        Player
                        <div class="inline {{$tableSortedBy!= 'name' ? 'text-gray-300 dark:text-gray-600' : 'text-black dark:text-gray-300'}} focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>

                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-center text-xs font-medium tracking-wider uppercase h-4 cursor-pointer focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900"
                        wire:click='sortTable("wins")'>
                        W
                        <div class="inline {{$tableSortedBy!= 'wins' ? 'text-gray-300 dark:text-gray-600' : 'text-black dark:text-gray-300'}} focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-center text-xs font-medium tracking-wider uppercase cursor-pointer focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900"
                        wire:click='sortTable("losses")'>
                        L
                        <div class="inline {{$tableSortedBy!= 'losses' ? 'text-gray-300 dark:text-gray-600' : 'text-black dark:text-gray-300'}} focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-center text-xs font-medium tracking-wider uppercase cursor-pointer focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900"
                        wire:click='sortTable("games")'>
                        G
                        <div class="inline {{$tableSortedBy!= 'games' ? 'text-gray-300 dark:text-gray-600' : 'text-black dark:text-gray-300'}} focus:text-gray-400 hover:text-gray-400 dark:focus:text-gray-900 dark:hover:text-gray-900">
                            <x-clarity-sort-by-line class="inline w-5 h-5 mb-1" />
                        </div>
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-right text-xs font-medium tracking-wider uppercase pr-2">
                        WR%
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-none dark:bg-black">
                @foreach ($players as $player)

                <tr class="h-10">
                    <td class="w-2/5 pl-2">{{$player->name}}</td>
                    <td class="text-center">{{$player->wins}}</td>
                    <td class="text-center">{{$player->losses}}</td>
                    <td class="text-center">{{$player->games}}</td>
                    <td class="text-right pr-2">
                        {{ $player->games != 0 ? number_format((($player->wins / $player->games)*100),2) : '' }}
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        </div>
    </x-clangim.window>

</div>
