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
    public $starTextClass = 'left-9';

    //DB colums.
    public $score;
    public $user_id;

    public function mount(): void
    {
        $this->loadUser();
    }

    public function setScore(int $score): void
    {
        $this->score = $score;
        $this->saveUserScore();
    }
 
    public function saveUserScore(): void
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

    public function prepareData(): array
    {
        return [
            'score' => $this->score,
            'replay_id' => $this->passedId,
            'user_id'   => $this->user_id,
        ];

    }

    public function loadUser(): void
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

    public function loadReplay(): void
    {
        $this->replay = Replay::findOrfail($this->passedId);
        $scoresCount = $this->replay->scores->count();
        $sum = $this->replay->scores->sum('score');
        
        $sum != 0 ? $this->averageScore = number_format(round($sum/$scoresCount, 1), 1, '.', '') : $this->averageScore = '';

        $this->setStarCssClass();
        
    }

    public function setStarCssClass(): void
    {
        if (!is_string($this->averageScore))
        {
            abs($this->averageScore) == 10 ? $this->starTextClass = 'left-8' : $this->starTextClass = 'left-9';
        }
    }

    public function render()
    {
        return view('livewire.replay.score', [
            'replay' => $this->loadReplay(),
        ]);
    }
}
