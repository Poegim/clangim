<?php

namespace App\Http\Traits;

use stdClass;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

trait Replay
{

    public $replay;

    public function validateReplay($file): stdClass
    {

        $this->replay = new stdClass();
        $this->replay->Errors = [];

        // $fileExtension = strtolower($file->getClientOriginalExtension());
        
        // if($fileExtension != 'rep')
        // {
        //     array_push($this->replay->Errors, 'Invalid extension.');
        //     return $this->replay;
        // }

        $executeScrep = new Process(['screp.exe', 'replayz/sc2.SC2Replay', null]);
        $executeScrep->run();

        if (!$executeScrep->isSuccessful()) {

            // Uncomment after final check, or remove.
            // if (env('APP_ENV') == 'local') {
            //     throw new ProcessFailedException($executeScrep);
            //     exit(1);
            // }

            if (($executeScrep->getOutput()) == "Failed to parse replay: Decoder.Section() error: not a replay file\n")
            {
                array_push($this->replay->Errors, 'Not a replay!');
                return $this->replay;
            } else
            {
                array_push($this->replay->Errors, 'Invalid file.');
                return $this->replay;
            }
        }
        
        $this->replay->Data = json_decode($executeScrep->getOutput());

        return $this->replay;

    }

}
