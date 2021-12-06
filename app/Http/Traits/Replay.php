<?php

namespace App\Http\Traits;

use stdClass;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

trait Replay
{

    public $replay;

    public function validateReplay($filePath): stdClass
    {

        $this->replay = new stdClass();
        $this->replay->Errors = [];

        $executeScrep = new Process(['screp.exe', $filePath]);
        $executeScrep->run();

        if (!$executeScrep->isSuccessful()) {

            $this->removeFile($filePath) ? null : abort(403, 'Contact administrator, unable to remove file!');

            if (env('APP_ENV') == 'local') {
                throw new ProcessFailedException($executeScrep);
                exit(1);
            }

            if ($executeScrep->getOutput() == "Failed to parse replay: Decoder.Section() error: not a replay file\n")
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

        if ($this->checkReplayEngine($this->replay->Data) == false)
        {
            array_push($this->replay->Errors, 'Invalid engine.');
            $this->removeFile($filePath) ? null : abort(403, 'Contact administrator, unable to remove file!');
            return $this->replay;
        }

        // dd($this->replay);

        return $this->replay;

    }

    public function saveFile($file): string
    {

        $generatedName = hexdec(uniqid());
        $fileName = $generatedName . '.rep';
        $uploadLocation = '../storage/app/public/replays/';
        $file->move($uploadLocation,$fileName);
        $newReplayPath = '../storage/app/public/replays/'.$fileName;
        return $newReplayPath;

    }

    public function removeFile(string $filePath): bool
    {
        return File::delete($filePath) ? true : false;
    }

    public function checkReplayEngine(stdClass $data): bool
    {
        return $data->Header->Engine->ShortName == "BW" ? true : false;
    }

}
