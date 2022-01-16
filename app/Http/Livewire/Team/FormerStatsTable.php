<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Http\Traits\TeamStats;

class FormerStatsTable extends Component
{
    use TeamStats;

    public $title = "Former Players Statistics";
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
