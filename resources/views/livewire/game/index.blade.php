<div class="flex justify-between">
    <div wire:model.defer="game">
        ID:{{$game->id()}}, type:{{ $game->type() }}
        @if ($game->result == 1)
            <x-fontisto-smiley class="w-5 h-5 ml-4 text-green-500 mb-1 inline"/>
        @endif

        @if ($game->result == 0)
        <x-fontisto-neutral class="w-5 h-5 ml-4 text-red-600 mb-1 inline"/>
        @endif
        
    </div>
    <div>
        <livewire:game.edit :game="$game" :key="$game->id"/>
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