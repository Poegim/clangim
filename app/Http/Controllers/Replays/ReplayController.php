<?php

namespace App\Http\Controllers\Replays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Traits\Replay as ReplayTrait;

class ReplayController extends Controller
{
    use ReplayTrait;

    public function index(): View
    {
        return view('replays.index');
    }

    public function create(): View
    {
        return view('replays.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
                'title' => ['required', 'string', 'min:3',],
                'file'  => 'required|file|mimetypes:application/octet-stream',
            ],
            [
                'file.mimetypes' => 'Invalid file format.',
            ]
        );

        $file = $request->file('file');
        $replayData = $this->validateReplay($file);
        dd($replayData);

        dd('Error, we are too much ahead.');

        $nameGen = hexdec(uniqid());
        $imgName = $nameGen . '.rep';
        $uploadLocation = 'replays/';
        $file->move($uploadLocation,$imgName);
        $filePath = 'replays/'.$imgName;



        Replay::create([
            'title' => $request->title,
            'file'  => $filePath,
            'user_id'   => auth()->user()->id,
        ]);


    }
}
