<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="py-6 px-2 sm:px-20 border-b border-gray-200 bg-white">
                    @foreach ($teamList as $teamPlayer)
                        <p>{{ $teamPlayer->wins->count() }}</p>
                    @endforeach

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Player
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Matches
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Wins
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Losses
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($teamList as $player)
                                
                            <tr>
                                <td>
                                    {{ $player->name }}
                                </td>

                                <td>
                                    {{ $player->matches->count() }}
                                </td>

                                <td>
                                    {{ $player->wins->count() }}
                                </td>

                                <td>
                                    {{ $player->losses->count() }}
                                </td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>
