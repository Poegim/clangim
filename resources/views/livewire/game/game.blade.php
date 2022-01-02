<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="pl-4 pr-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Type
                </th>
                <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Home Players
                </th>
                <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Enemy Players
                </th>
                <th scope="col"
                    class="pl-2 pr-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($games as $game)

            <tr>
                <td class="px-4 py-4">
                    <div class="text-sm text-gray-900">
                        {{$game->id}}
                    </div>
                </td>
                <td class="px-2 py-4 text-sm text-gray-500">
                    {{ $game->type() }}
                    @can('update', $game)
                    <div class="inline">
                        <button wire:click="showEditTypeModal({{$game->id}})" wire:loading.attr="disabled">
                            <x-zondicon-edit-pencil
                                class="w-5 h-5 text-indigo-600 focus:text-indigo-800 hover:text-indigo-800" />
                            </a>
                        </button>
                    </div>
                    @endcan
                </td>
                <td class="px-2 py-4 text-sm text-gray-500">
                    <div class="grid grid-cols-4">

                        <div class="col-span-3">
                            @foreach ($game->homePlayers as $homePlayer)
                            <div>{{ $homePlayer->user->name }}</div>
                            @endforeach

                        </div>

                        <div>
                            @can('update', $game)

                            <button wire:click="showEditTypeModal({{$game->id}})" wire:loading.attr="disabled">
                                <x-zondicon-edit-pencil
                                    class="w-5 h-5 text-indigo-600 focus:text-indigo-800 hover:text-indigo-800" />
                                </a>
                            </button>
                            @endcan
                        </div>

                    </div>
                </td>
                <td class="px-2 py-4 text-sm text-gray-500">
                    <div class="grid grid-cols-4">

                        <div class="col-span-3">
                            @foreach ($game->enemyPlayers as $enemyPlayer)
                            <div>{{ $enemyPlayer->name }}</div>
                            @endforeach
                        </div>

                        <div>
                            @can('update', $game)

                            <button wire:click="showEditTypeModal({{$game->id}})" wire:loading.attr="disabled">
                                <x-zondicon-edit-pencil
                                    class="w-5 h-5 text-indigo-600 focus:text-indigo-800 hover:text-indigo-800" />
                                </a>
                            </button>
                            @endcan
                        </div>


                </td>
                <td class="px-0 md:px-2 py-2 text-sm font-medium">

                    <div class="flex justify-center">

                        @can('delete', $game)
                        <button
                            class="cursor-pointer text-sm font-semibold text-red-500 focus:text-red-700 hover:text-red-700"
                            wire:click="showDeleteModal({{$game->id}})" wire:loading.attr="disabled">
                            <x-zondicon-trash class="w-5 h-5" />
                        </button>
                        @endcan


                    </div>
                </td>
            </tr>

            @endforeach

            <!-- Next line -->
        </tbody>
    </table>


    <!-- Edit Type Modal Form -->
    <x-jet-dialog-modal wire:model="editTypeModalVisibility">
        <x-slot name="title">
            {{ __("Edit Game: ") }} {{ $modelId }}
        </x-slot>

        <x-slot name="content">
            <div>

                @if($gameModel != null)

                <div>
                    <x-jet-label class="mt-2" for="country" value="{{ __('Game type:')}}" />
                    <select name="type" id="type"
                        class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block"
                        wire:model.debounce.800ms="type">
                        <option value="1">1v1</option>
                        <option value="2">2v2</option>
                        <option value="3">3v3</option>
                        <option value="4">4v4</option>
                    </select>
                    <x-jet-input-error for="type" class="mt-2" />

                </div>

                @endif

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editTypeModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>


            <x-jet-danger-button wire:click="updateType" wire:loading.attr='disabled'>
                {{ __("Update Type")}}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Edit Type Modal Form -->

</div>
