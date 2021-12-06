<?php

namespace App\View\Components\Clangim\Replays;

use App\Models\Replays\Replay as ReplayModel;
use Illuminate\View\Component;
use stdClass;

class Replay extends Component
{

    public $replay;
    public $playerOne;
    public $playerTwo;
    public $playerThree;
    public $playerFour;
    public $playerFive;
    public $playerSix;
    public $playerSeven;
    public $playerEight;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ReplayModel $replay)
    {
        $this->replay = $replay;

        $this->playerOne = new stdClass;
        $this->playerOne->name = $replay->player_1;
        $this->playerOne->apm = $replay->player_1_apm;
        $this->playerOne->eapm = $replay->player_1_eapm;
        $this->playerOne->race = $replay->player_1_race;
        $this->playerOne->team = $replay->playerOneTeam();

        $this->playerTwo = new stdClass;
        $this->playerTwo->name = $replay->player_2;
        $this->playerTwo->apm = $replay->player_2_apm;
        $this->playerTwo->eapm = $replay->player_2_eapm;
        $this->playerTwo->race = $replay->player_2_race;
        $this->playerTwo->team = $replay->playerTwoTeam();

        $this->playerThree = new stdClass;
        $this->playerThree->name = $replay->player_3;
        $this->playerThree->apm = $replay->player_3_apm;
        $this->playerThree->eapm = $replay->player_3_eapm;
        $this->playerThree->race = $replay->player_3_race;
        $this->playerThree->team = $replay->playerThreeTeam();

        $this->playerFour = new stdClass;
        $this->playerFour->name = $replay->player_4;
        $this->playerFour->apm = $replay->player_4_apm;
        $this->playerFour->eapm = $replay->player_4_eapm;
        $this->playerFour->race = $replay->player_4_race;
        $this->playerFour->team = $replay->playerFourTeam();

        $this->playerFive = new stdClass;
        $this->playerFive->name = $replay->player_5;
        $this->playerFive->apm = $replay->player_5_apm;
        $this->playerFive->eapm = $replay->player_5_eapm;
        $this->playerFive->race = $replay->player_5_race;
        $this->playerFive->team = $replay->playerFiveTeam();

        $this->playerSix = new stdClass;
        $this->playerSix->name = $replay->player_6;
        $this->playerSix->apm = $replay->player_6_apm;
        $this->playerSix->eapm = $replay->player_6_eapm;
        $this->playerSix->race = $replay->player_6_race;
        $this->playerSix->team = $replay->playerSixTeam();

        $this->playerSeven = new stdClass;
        $this->playerSeven->name = $replay->player_7;
        $this->playerSeven->apm = $replay->player_7_apm;
        $this->playerSeven->eapm = $replay->player_7_eapm;
        $this->playerSeven->race = $replay->player_7_race;
        $this->playerSeven->team = $replay->playerSevenTeam();

        $this->playerEight = new stdClass;
        $this->playerEight->name = $replay->player_8;
        $this->playerEight->apm = $replay->player_8_apm;
        $this->playerEight->eapm = $replay->player_8_eapm;
        $this->playerEight->race = $replay->player_8_race;
        $this->playerEight->team = $replay->playerEightTeam();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.clangim.replays.replay');
    }
}
