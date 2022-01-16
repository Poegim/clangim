<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;

trait TeamStats
{
    public function sortTable(string $sortBy)
    {
        $sortBy == 'name' ? $descOrAsc = 'asc' : $descOrAsc = 'desc';
        
        $this->players = $this->players->sortBy([
            [$sortBy, $descOrAsc],
            ['games', 'desc'],
        ]);

        $this->tableSortedBy = $sortBy;

    }

    public function setStats()
    {
        $this->homePlayersGames = DB::table('game_home_players')
        ->join('games', 'game_home_players.game_id', '=', 'games.id')
        ->get();

        foreach($this->players as $player)
        {
            $player->wins = 0;
            $player->losses = 0;

            foreach($this->homePlayersGames as $game)
            {
                if($player->id == $game->user_id)
                {
                    $game->result == 1 ? $player->wins++ : '';
                    $game->result == 0 ? $player->losses++ : '';                    
                }
            }

            $player->games = $player->losses + $player->wins;
        }

    }

}