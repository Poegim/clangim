<?php

namespace App\Http\Controllers\Replays;

use stdClass;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Replays\Replay;
use App\Http\Controllers\Controller;
use App\Http\Traits\Replay as ReplayTrait;

class ReplayController extends Controller
{
    use ReplayTrait;

    public function index(): View
    {
        $replays = Replay::orderByDesc('created_at')->get();
        return view('replays.index', compact('replays'));
    }

    public function show(Replay $replay): View
    {
        return view('replays.show', [
            'replay' => $replay,
        ]);
    }

    public function create(): View
    {
        return view('replays.create');
    }

    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
                'title' => ['required', 'string', 'min:3',],
                'file'  => 'required|file|mimetypes:application/octet-stream',
            ],
            [
                'file.mimetypes' => 'Invalid file format.',
            ]
        );

        //This should be done as new validate() rule or RULE::(?) - in future.

        $file = $request->file('file');

        // ++ add extension check .rep?

        $newFilePath = $this->saveFile($file);
        $replayData = $this->validateReplay($newFilePath);

        if (!empty($replayData->Errors[0]))
        {
            return redirect()->route('replays.create')->withErrors(['file' => $replayData->Errors[0]]);
        }

        //Yes this, inside both comments.
                        
        Replay::create($this->generateDataForModel($replayData->Data, $request->title, $newFilePath));

        return redirect()->route('replays.index')->with('success', 'Replay added!');

    }

    public function generateDataForModel(stdClass $replayData, string $title, string $newFilePath): array
    {
        $generatedData = [
            'title'     => $title,
            'file'      => $newFilePath,
            'players_count' => count($replayData->Header->Players),
            'user_id'   => auth()->user()->id,
        ];

        for ($i=0; $i < count($replayData->Header->Players); $i++) 
        {           
            $generatedData['player_'.($i+1)] =  $replayData->Header->Players[$i]->Name;
            $generatedData['player_'.($i+1).'_team'] =  $replayData->Header->Players[$i]->Team;
            $generatedData['player_'.($i+1).'_race'] =  $replayData->Header->Players[$i]->Race->Name;
            $generatedData['player_'.($i+1).'_apm'] =  $replayData->Computed->PlayerDescs[$i]->APM;
            $generatedData['player_'.($i+1).'_eapm'] =  $replayData->Computed->PlayerDescs[$i]->EAPM;
        }

        return $generatedData;

    }

    public function edit(Replay $replay): View
    {
        return view('replays.edit', compact('replay'));
    }

    public function update(Request $request, Replay $replay)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'min:2'],
        ]);

        $replay->title = $request->title;
        $replay->edited_by = auth()->user()->id;
        $replay->save();

        return redirect()->route('replays.show', $replay->id)->with('success', 'Replay updated.');

    }

}
