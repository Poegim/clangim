<div>

    <div>
        <x-alert type="success" class="bg-green-700 text-green-100 p-2 mb-4" x-data="{ show: true }" x-show="show"
        x-init="setTimeout(() => show = false, 3000)" 
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-50"
        />
    </div>


    <div class="mb-6 flex justify-end">
        <x-jet-button type="button" wire:click="showCreateModal">
            Add game
        </x-jet-button>
    </div>
    
    @foreach ($games as $game)

    <div class="flex justify-between">
        <div>
            ID:{{$game->id()}}, type: {{ $game->type() }}
            @if ($game->result == 1)
            <x-fontisto-smiley class="w-5 h-5 ml-4 text-green-500 mb-1 inline" />
            @endif

            @if ($game->result == 0)
            <x-fontisto-neutral class="w-5 h-5 ml-4 text-red-600 mb-1 inline" />
            @endif

        </div>
        <div>
            <button wire:click="showEditModal({{$game->id()}})">
                <x-clarity-note-edit-solid
                    class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1" />
            </button>
            <button wire:click="showDeleteModal({{$game->id()}})">
                <x-clarity-trash-solid
                    class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1" />
            </button>
        </div>
    </div>

    <div class="text-xs text-gray-400 grid grid-cols-3">
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

    @endforeach


    <!-- Edit Modal Form -->
    <div>
        <x-jet-dialog-modal wire:model="editModalVisibility">
            <x-slot name="title">
                {{ __('Edit game') }} {{ $modelId }}
            </x-slot>

            <x-slot name="content">
                <div>
                    <x-jet-label for="result" value="{{ __('Result') }}" />
                    <select name="result" id="result" class="rounded" wire:model='result'>
                        <option value="1" @if($result == 1 ) selected @endif>WIN</option>
                        <option value="0" @if($result == 0 ) selected @endif>LOSE</option>
                    </select>

                    <x-jet-input-error for="result" class="mt-2 mb-2" />
                </div>

                <div class="grid grid-cols-2 mt-2">
                    
                    <!-- Players 1 -->
                    <div class="pr-2">
                        <x-jet-label for="home_player_1" value="{{ __('Home player 1') }}" />   
                        <select 
                            name="home_player_1" 
                            id="home_player_1" 
                            class="rounded w-full" 
                            wire:model='home_player_1'
                        >
                            <option>Please select...</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="home_player_1" class="mt-2 mb-2" />
                    </div>

                    <div class="pl-2">
                        <x-jet-label for="enemy_player_1" value="{{ __('Enemy player 1') }}" />
                        <x-jet-input 
                            id="enemy_player_1" 
                            name="enemy_player_1" 
                            class="block w-full" 
                            type="text" 
                            wire:model.debounce.800ms='enemy_player_1'
                        />
                        <x-jet-input-error for="enemy_player_1" class="mt-2 mb-2" />
                    </div>

                    <!-- Players 2 -->
                    @if (($type == 2) || ($type == 3) || ($type == 4))
                        
                    <div class="pr-2">
                        <x-jet-label for="home_player_2" value="{{ __('Home player 2') }}" />   
                        <select 
                            name="home_player_2" 
                            id="home_player_2" 
                            class="rounded w-full" 
                            wire:model='home_player_2'
                        >
                            <option>Please select...</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="home_player_2" class="mt-2 mb-2" />
                    </div>

                    <div class="pl-2">
                        <x-jet-label for="enemy_player_2" value="{{ __('Enemy Player 2') }}" />
                        <x-jet-input 
                            id="enemy_player_2" 
                            name="enemy_player_2" 
                            class="block mt-1 w-full" 
                            type="text" 
                            wire:model.debounce.800ms='enemy_player_2'
                        />
                        <x-jet-input-error for="enemy_player_2" class="mt-2 mb-2" />
                    </div>

                    @endif


                    <!-- Players 3 -->
                    @if (($type == 3) || ($type == 4))
                        
                    <div class="pr-2">
                        <x-jet-label for="home_player_3" value="{{ __('Home player 3') }}" />   
                        <select 
                            name="home_player_3" 
                            id="home_player_3" 
                            class="rounded w-full" 
                            wire:model='home_player_3'
                        >
                            <option>Please select...</option>  
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="home_player_3" class="mt-2 mb-2" />
                    </div>

                    <div class="pl-2">
                        <x-jet-label for="enemy_player_3" value="{{ __('Enemy Player 3') }}" />
                        <x-jet-input 
                            id="enemy_player_3" 
                            name="enemy_player_3" 
                            class="block mt-1 w-full" 
                            type="text" 
                            wire:model.debounce.800ms='enemy_player_3'
                        />
                        <x-jet-input-error for="enemy_player_3" class="mt-2 mb-2" />
                    </div>

                    @endif


                    <!-- Players 4 -->
                    @if ($type == 4)
    
                    <div class="pr-2">
                        <x-jet-label for="home_player_4" value="{{ __('Home player 4') }}" />   
                        <select 
                            name="home_player_4" 
                            id="home_player_4" 
                            class="rounded w-full" 
                            wire:model='home_player_4'
                        >
                            <option>Please select...</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="home_player_4" class="mt-2 mb-2" />
                    </div>

                    <div class="pl-2">
                        <x-jet-label for="enemy_player_4" value="{{ __('Enemy Player 4') }}" />
                        <x-jet-input 
                            id="enemy_player_4" 
                            name="enemy_player_4" 
                            class="block mt-1 w-full" 
                            type="text" 
                            wire:model.debounce.800ms='enemy_player_4'
                        />
                        <x-jet-input-error for="enemy_player_4" class="mt-2 mb-2" />
                    </div>

                    @endif

                </div>


            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    <!-- End Of Edit Modal Form -->

    <!-- Delete Modal Form -->
    <x-jet-dialog-modal wire:model="deleteModalVisibility">
        <x-slot name="title" >
            {{ __("Delete Game ") }} {{$modelId}}
        </x-slot>

        <x-slot name="content">
            {{ __("Are you sure you want to delete this game?")}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="cancel"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="delete()" wire:loading.attr='disabled'>
                {{ __("Delete Game")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Delete Modal Form -->

    <!-- Create Modal Form -->
    <x-jet-dialog-modal wire:model="createModalVisibility">
        <x-slot name="title" >
            {{ __("Add Game") }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-2">

                <x-jet-label for="type" value="{{ __('Type:') }}" />
                <select name="type" id="type" class="rounded" wire:model='type'>
                    <option>Please select</option>
                    <option value="1">1v1</option>
                    <option value="2">2v2</option>
                    <option value="3">3v3</option>
                    <option value="4">4v4</option>
                </select>
                <x-jet-input-error for="type" class="mt-2 mb-2" />

            </div>

            <div class="mt-2">

                <x-jet-label for="result" value="{{ __('Result:') }}" />
                <select name="result" id="result" class="rounded" wire:model='result'>
                    <option value="-1">Please select</option>
                    <option value="1">WIN</option>
                    <option value="0">LOSE</option>

                </select>
                <x-jet-input-error for="result" class="mt-2 mb-2" />

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="cancel"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="create()" wire:loading.attr='disabled'>
                {{ __("Create Game")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Create Modal Form -->


</div>
