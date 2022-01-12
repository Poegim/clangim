<?php

namespace App\Http\Livewire\Replay;

use App\Models\Replays\Replay;
use Livewire\Component;
use App\Models\Replays\Score as ReplaysScore;

class Score extends Component
{
    public $passedId;
    public $replay;
    public $userReplayScore;
    public $averageScore;

    //DB colums.
    public $score;
    public $user_id;

    public function mount()
    {
        $this->loadUser();
    }

    public function setScore(int $score)
    {
        $this->score = $score;
        $this->saveUserScore();
    }
 
    public function saveUserScore()
    {
        if($this->userReplayScore != null)
        {   
            $this->userReplayScore->update($this->prepareData());

        } else
        {
            ReplaysScore::create($this->prepareData());
        }

        $this->loadUser();
        
    }

    public function prepareData()
    {
        return [
            'score' => $this->score,
            'replay_id' => $this->passedId,
            'user_id'   => $this->user_id,
        ];

    }

    public function loadUser()
    {
        if(auth()->check())
        {
            $this->user_id = auth()->user()->id;
        
            $this->userReplayScore = ReplaysScore::where('replay_id', $this->passedId)->where('user_id', auth()->user()->id)->first();
            if($this->userReplayScore != null)
            {
                $this->score = $this->userReplayScore->score;
            }
        }
    }

    public function loadReplay()
    {
        $this->replay = Replay::findOrfail($this->passedId);
        $scoresCount = $this->replay->scores->count();
        $sum = $this->replay->scores->sum('score');
        
        $this->averageScore = number_format(round($sum/$scoresCount, 1), 1, '.', '');
    }

    public function render()
    {
        return view('livewire.replay.score', [
            'replay' => $this->loadReplay(),
        ]);
    }
}
