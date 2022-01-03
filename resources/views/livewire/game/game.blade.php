
<div>

    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show"
        x-init="setTimeout(() => show = false, 3000)" />

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
                    class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    
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
                    @can('update', $game)
                        <button wire:click="showEditTypeModal({{$game->id}})" wire:loading.attr="disabled">
                            <x-zondicon-edit-pencil
                                class="w-3 h-3 text-gray-400 focus:text-gray-600 hover:text-gray-600" />
                            </a>
                        </button>
                    @endcan
                    {{ $game->type() }}
                </td>

                <td class="px-2 py-4 text-sm text-gray-500">
                    @foreach ($game->homePlayers as $homePlayer)
                    <div>
                        @can('update', $game)

                        <button wire:click="showEditHomePlayerModal({{$homePlayer->id}})" wire:loading.attr="disabled">
                            <x-zondicon-edit-pencil
                            class="w-3 h-3 text-gray-400 focus:text-gray-600 hover:text-gray-600" />
                        </a>
                        </button>
                        @endcan
                        <span>{{ $homePlayer->user->name }}</span>
                    </div>
                    @endforeach
                </td>
                <td class="px-2 py-4 text-sm text-gray-500">

                    @foreach ($game->enemyPlayers as $enemyPlayer)
                    <div>
                        @can('update', $game)

                        <button wire:click="showEditTypeModal({{$game->id}})" wire:loading.attr="disabled">
                            <x-zondicon-edit-pencil
                            class="w-3 h-3 text-gray-400 focus:text-gray-600 hover:text-gray-600" />
                        </a>
                        </button>
                        @endcan
                        
                        <span>{{ $enemyPlayer->name }}</span>
                        
                    </div>
                    @endforeach

                </td>

                <td class="px-0 md:px-2 py-2 text-sm font-medium">
                    <div class="flex justify-center">
                        @can('delete', $game)
                        <button
                            class="cursor-pointer text-sm font-semibold text-gray-400 focus:text-gray-600 hover:text-gray-600"
                            wire:click="showDeleteModal({{$game->id}})" wire:loading.attr="disabled">
                            <x-zondicon-trash class="w-4 h-4" />
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
                <div>
                    <x-jet-label class="mt-2" for="type" value="{{ __('Game type:')}}" />
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

    <!-- Edit HOME PLAYER Modal Form -->
    <x-jet-dialog-modal wire:model="editHomePlayerModalVisibility">
        <x-slot name="title">
            {{ __("Edit Player") }}
        </x-slot>

        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label class="mt-2" for="home_player" value="{{ __('Player:')}}" />
                    <select name="home_player" id="home_player"
                        class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block"
                        wire:model.debounce.800ms="home_player">

                        @foreach ($teamPlayers as $teamPlayer)
                            <option value="{{$teamPlayer->id}}">{{$teamPlayer->name}}</option>
                        @endforeach

                    </select>
                    <x-jet-input-error for="home_player" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editHomePlayerModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="updateHomePlayer" wire:loading.attr='disabled'>
                {{ __("Update Player")}}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Edit HOME PLAYER Modal Form -->

    <!-- Delete Modal Form -->
    <x-jet-dialog-modal wire:model="deleteModalVisibility">
        <x-slot name="title" >
            {{ __("Delete Game") }}
        </x-slot>

        <x-slot name="content">
            {{ __("Are you sure you want to delete this game?")}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('deleteModalVisibility')"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deleteGame" wire:loading.attr='disabled'>
                {{ __("Delete Game")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- End of Delete Modal Form -->

</div>
