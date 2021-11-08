<div class="inline text-left">

    <a 
    class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
    wire:click="edit"
    wire:loading.attr="disabled"
    data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $game->id }})"
    >
        <x-clarity-note-edit-solid 
        class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1 cursor-pointer"
        />
    </a>

    <x-jet-dialog-modal wire:model="modalVisibility">
        <x-slot name="title" >
            {{ __("Edit game") }}
        </x-slot>

        <x-slot name="content">
            <div>
                Game ID: {{ $game->id }}
            </div>
            <div class="mt-2">
                <x-jet-label for="result" value="{{ __('Result:') }}" />

                <select 
                    class="form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                    name="result" 
                    id="result"
                    wire:model="result">

                    <option value="1">WIN</option>
                    <option value="0">LOSE</option>

                </select>

                <x-jet-input-error for="result" class="mt-2" />
            </div>
            
            @php
                $arrayGame = $game->toArray();
            @endphp

            @for ($i = 1; $i <= $game->type; $i++)

            <div class="grid grid-cols-2 pt-2">
                <div class="pr-2">
                    
                    <x-jet-label for="home_player_{{$i}}" value="{{ __('Home player '.$i) }}" />

                    <select 
                        class="form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" 
                        name="home_player_{{$i}}" 
                        id="home_player_{{$i}}"
                        wire:model="home_player_{{$i}}">

                        @foreach ($players as $player)
                        
                        @php

                            $homePlayer = 'home_player_'.$i;
                            
                        @endphp

                            @if($player->id == $arrayGame[$homePlayer])
                                <option value="{{$player->id}}" selected>
                                    {{$player->name}}
                                </option>
                            @endif

                        @endforeach

                        @foreach ($players as $player)

                            @if($player->id != $arrayGame[$homePlayer])
                            <option value="{{$player->id}}">
                                {{$player->name}}
                            </option>
                            @endif

                        @endforeach

                    </select>

                    <x-jet-input-error for="home_player_{{$i}}" class="mt-2" />
                </div>

                <div class="pl-2">
                    <x-jet-label for="enemy_player_{{$i}}" value="{{ __('Enemy player '.$i) }}" />
                    <x-jet-input class="mt-1 w-full" type="text" name="enemy_player_{{$i}}" id="enemy_player_{{$i}}" 
                    wire:model.debounce.800ms="enemy_player_{{$i}}" >
                    @switch($i)
                        @case(1)
                            {{$game->enemy_player_1}}
                            @break
                    
                        @default
                            
                    @endswitch
                    </x-jet-input>
                    <x-jet-input-error for="enemy_player_{{$i}}" class="mt-2" />
                </div>

            </div>
            @endfor

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="cancel"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-button wire:click="update" wire:loading.attr='disabled'>
                {{ __("Save")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    
</div>