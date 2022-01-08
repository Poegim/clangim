<div>

    <x-notification></x-notification>

    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-2 pb-6">
        @foreach ($games as $game)
        <div class="rounded overflow-hidden shadow-lg mt-4 pb-8 relative">
            <div class="px-6">
                <div class="font-bold text-xl mb-2 mt-2">ID:{{$game->id()}}, type:{{$game->type()}}
                
                    @if ($game->result == 1)
                    <x-fontisto-smiley class="w-5 h-5 ml-4 text-green-500 mb-1 inline" />
                    @endif

                    @if ($game->result == 0)
                    <x-fontisto-neutral class="w-5 h-5 ml-4 text-red-600 mb-1 inline" />
                    @endif
                
                </div>
                <div class="grid grid-cols-2 mb-2">
                    <div>
                        @foreach ($game->homePlayers as $homePlayer)
                        <div class="flex gap-1">
                            @can('update', $game)
                            <button wire:click="showEditHomePlayerModal({{$homePlayer->id}})"
                                wire:loading.attr="disabled">
                                <x-clarity-note-edit-line
                                    class="w-4 h-4 text-gray-400 focus:text-gray-600 hover:text-gray-600" />
                                </a>
                            </button>
                            @endcan
                            @can('delete', $game)
                            <button
                                class="cursor-pointer text-sm font-semibold text-gray-400 focus:text-gray-600 hover:text-gray-600"
                                wire:click="showDeleteModal({{$homePlayer->id}}, 'homePlayer')"
                                wire:loading.attr="disabled">
                                <x-clarity-trash-line class="w-4 h-4 mr-2" />
                            </button>
                            @endcan

                            <span>{{ $homePlayer->user->name }}</span>
                        </div>

                        @endforeach
                        @if ($game->homePlayers->count() != $game->type)

                        <div class="mt-1 pr-2">
                            <button
                                class="rounded-lg w-full border-2 text-black text-xs hover:bg-black hover:text-white"
                                wire:click='showAddHomePlayerModal({{$game->id}})'
                                >
                                <x-clarity-add-line class="w-4 h-4 inline" /> add player
                            </button>
                        </div>

                        @endif
                    </div>
                    <div>
                        @foreach ($game->enemyPlayers as $enemyPlayer)
                        <div class="flex gap-1">
                            @can('update', $game)
                            <button wire:click="showEditEnemyPlayerModal({{$enemyPlayer->id}})"
                                wire:loading.attr="disabled">
                                <x-clarity-note-edit-line
                                    class="w-4 h-4 text-gray-400 focus:text-gray-600 hover:text-gray-600" />
                                </a>
                            </button>
                            @endcan
                            @can('delete', $game)
                            <button
                                class="cursor-pointer text-sm font-semibold text-gray-400 focus:text-gray-600 hover:text-gray-600"
                                wire:click="showDeleteModal({{$enemyPlayer->id}}, 'enemyPlayer')"
                                wire:loading.attr="disabled">
                                <x-clarity-trash-line class="w-4 h-4  mr-2" />
                            </button>
                            @endcan

                            <span>{{ $enemyPlayer->name }}</span>

                        </div>


                        @endforeach
                        @if ($game->enemyPlayers->count() != $game->type)

                        <div class="mt-1 pr-2 mb-2">
                            <button
                                class="rounded-lg w-full border-2 text-black text-xs hover:bg-black hover:text-white"
                                wire:click='showAddEnemyPlayerModal({{$game->id}})'
                            >
                                <x-clarity-add-line class="w-4 h-4 inline" /> add player
                            </button>
                        </div>

                        @endif
                    </div>
                </div>

            </div>
            <div class="px-6 absolute bottom-0 right-0">
                <div class="flex pb-4">
                    @can('delete', $game)
                    <button
                        class="cursor-pointer text-sm font-semibold text-gray-400 focus:text-gray-600 hover:text-gray-600"
                        wire:click="showDeleteModal({{$game->id}}, 'game')" wire:loading.attr="disabled">
                        <x-clarity-trash-line class="w-5 h-5 mr-2" />
                    </button>
                    @endcan
                    @can('update', $game)
                    <button wire:click="showEditGameModal({{$game->id}})" wire:loading.attr="disabled">
                        <x-clarity-note-edit-line
                            class="w-5 h-5 text-gray-400 focus:text-gray-600 hover:text-gray-600" />
                        </a>
                    </button>
                    @endcan
                </div>
            </div>

            <div class="h-2 absolute bottom-0 w-full bg-gradient-to-r {{$game->result == 1 ? 'from-green-400' : 'from-red-400'}}">
            </div>

            
        </div>
        @endforeach

        <div class="rounded overflow-hidden shadow-lg mt-4 relative align-middle">
            <div class="px-20 py-6 flex justify-center">

                <button class="rounded-full w-full border-2 text-black text-xs hover:bg-black hover:text-white shadow"
                    wire:click='showAddGameModal'    
                >
                    <x-clarity-add-line class="w-1/3 inline pt-6" /> <div class="py-6">add game</div>
                    
                </button>

            </div>

        </div>
    </div>


    <!-- Add Game Modal Form -->
    <x-jet-dialog-modal wire:model="addGameModalVisibility">
        <x-slot name="title">
            {{ __("Add Game: ") }}
        </x-slot>

        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label class="mt-2" for="add_game_type" value="{{ __('Game type:')}}" />
                    <select name="add_game_type" id="add_game_type"
                        class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block"
                        wire:model.debounce.800ms="add_game_type">
                        <option value="1">1v1</option>
                        <option value="2">2v2</option>
                        <option value="3">3v3</option>
                        <option value="4">4v4</option>
                    </select>
                    <x-jet-input-error for="add_game_type" class="mt-2" />
                </div>

                <div>
                    <x-jet-label class="mt-2" for="add_game_result" value="{{ __('Game result:')}}" />
                    <select name="add_game_result" id="add_game_result"
                        class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block"
                        wire:model="add_game_result">
                        <option value="1">WIN</option>
                        <option value="0">LOSE</option>

                    </select>
                    <x-jet-input-error for="add_game_result" class="mt-2" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addGameModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="storeGame" wire:loading.attr='disabled'>
                {{ __("Save")}}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Add Game Modal Form -->


    <!-- Edit Game Modal Form -->
    <x-jet-dialog-modal wire:model="editGameModalVisibility">
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

                <div>
                    <x-jet-label class="mt-2" for="result" value="{{ __('Game result:')}}" />
                    <select name="result" id="result"
                        class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block"
                        wire:model="result">
                        <option value="1">WIN</option>
                        <option value="0">LOSE</option>

                    </select>
                    <x-jet-input-error for="result" class="mt-2" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editGameModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="updateGame" wire:loading.attr='disabled'>
                {{ __("Update")}}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Edit Game Modal Form -->

    <!-- Add HOMEPLAYER Modal Form -->
    <x-jet-dialog-modal wire:model="addHomePlayerModalVisibility">
        <x-slot name="title">
            {{ __("Add Player") }}
        </x-slot>

        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label class="mt-2" for="add_home_player" value="{{ __('Select player:')}}" />
                    <select name="add_home_player" id="add_home_player"
                        class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block"
                        wire:model="add_home_player">

                        @foreach ($teamPlayers as $teamPlayer)
                        <option value="{{$teamPlayer->id}}">{{$teamPlayer->name}}</option>
                        @endforeach

                    </select>
                    <x-jet-input-error for="add_home_player" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addHomePlayerModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="storeHomePlayer" wire:loading.attr='disabled'>
                {{ __("Add Player")}}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Add HOME PLAYER Modal Form -->

    <!-- Add ENEMY PLAYER Modal Form -->
    <x-jet-dialog-modal wire:model="addEnemyPlayerModalVisibility">
        <x-slot name="title">
            {{ __("Add Player") }}
        </x-slot>

        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label class="mt-2" for="add_enemy_player" value="{{ __('Enter name:')}}" />
                    <x-jet-input class="w-full" type="text" name="add_enemy_player" id="add_enemy_player" wire:model='add_enemy_player'/>
                    <x-jet-input-error for="add_enemy_player" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addEnemyPlayerModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="storeEnemyPlayer" wire:loading.attr='disabled'>
                {{ __("Add Player")}}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Add ENEMY PLAYER Modal Form -->

    <!-- Edit HOMEPLAYER Modal Form -->
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

    <!-- Edit ENEMY PLAYER Modal Form -->
    <x-jet-dialog-modal wire:model="editEnemyPlayerModalVisibility">
        <x-slot name="title">
            {{ __("Edit Player") }}
        </x-slot>

        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label class="mt-2" for="enemy_player" value="{{ __('Player:')}}" />
                    <x-jet-input type="text" class="w-full" wire:model='enemy_player' />
                    <x-jet-input-error for="enemy_player" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editEnemyPlayerModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="updateHomePlayer" wire:loading.attr='disabled'>
                {{ __("Update Player")}}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Edit ENEMY PLAYER Modal Form -->

    <!-- Delete Modal Form -->
    <x-jet-dialog-modal wire:model="deleteModalVisibility">
        <x-slot name="title">
            {{ __("Delete Game") }}
        </x-slot>

        <x-slot name="content">
            {{ __("Are you sure you want to delete")}}
            @switch($modelType)
            @case('game')
            game?
            @break

            @case('homePlayer')
            home player?
            @break

            @case('enemyPlayer')
            enemy player?
            @break
            @endswitch
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            @switch($modelType)
            @case('game')
            <x-jet-danger-button wire:click="deleteGame" wire:loading.attr='disabled'>
                {{ __("Delete Game")}}
            </x-jet-danger-button>
            @break

            @case('homePlayer')
            <x-jet-danger-button wire:click="deleteHomePlayer" wire:loading.attr='disabled'>
                {{ __("Delete Home Player")}}
            </x-jet-danger-button>
            @break

            @case('enemyPlayer')
            <x-jet-danger-button wire:click="deleteEnemyPlayer" wire:loading.attr='disabled'>
                {{ __("Delete Enemy Player")}}
            </x-jet-danger-button>
            @break
            @endswitch

        </x-slot>
    </x-jet-dialog-modal>
    <!-- End of Delete Modal Form -->

</div>
