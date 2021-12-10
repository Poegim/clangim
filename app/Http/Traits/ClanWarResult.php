<?php

namespace App\Http\Traits;

use stdClass;
use App\Models\ClanWars\Game;

trait ClanWarResult
{
    public function clanWarResult($clanWar): stdClass
    {
        $results = new stdClass;

        $results->wonGames = Game::where('clan_war_id', $clanWar->id)->where('result', '1')->get();
        $results->loseGames = Game::where('clan_war_id', $clanWar->id)->where('result', '0')->get();
        $results->wins = $results->wonGames->count();
        $results->losses = $results->loseGames->count();

        if($results->wonGames->count() > $results->loseGames->count())
        {
            $results->finalResult = 'WIN';
        } elseif($results->wonGames->count() < $results->loseGames->count())
        {
            $results->finalResult = 'LOSE';
        } elseif($results->wonGames->count() == $results->loseGames->count())
        {
            $results->finalResult = 'DRAW';
        }

        return $results;
        
    }
}