<?php

namespace App\Http\Livewire\Team;

use App\Http\Traits\TeamStats;
use Livewire\Component;

class TeamStatsTable extends Component
{
    use TeamStats;

    public $title = "Team Statistics";
    public $homePlayersGames;
    public $players;
    public $tableSortedBy;

    public function booted()
    {
        $this->setStats();
        $this->sortTable('players', 'wins');
    }

    public function render()
    {
        return view('livewire.team.team-stats-table');
    }
}
