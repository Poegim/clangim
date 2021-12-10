<?php

namespace App\Http\Livewire\ClanWar;

use App\Http\Traits\ClanWarResult;
use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Policies\ClanWarPolicy;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use App\Models\ClanWars\ClanWar as ClanWarModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClanWar extends Component
{
    use AuthorizesRequests;
    use ClanWarResult;

    public $createAndEditModalVisibility = false;
    public $deleteModalVisibility = false;

    public $modelId;
    public $clanWar;

    public $title;
    public $date;
    public $user_id;

    public function rules(): array
    {
        if($this->modelId == NULL) 
        {
            return [
                'title' => [
                    'required', 
                    'string',
                    Rule::unique('clan_wars'),
                ],
                'date' => ['required'],
            ];
        } else
        {
            return [
                'title' => [
                    'required', 
                    'string',
                    Rule::unique('clan_wars')->ignore($this->modelId, 'id'),
                ],
                'date' => ['required'],
            ]; 
        }

    }

    public function showCreateModal(): void
    {
        $this->title = null;
        $this->date = null;
        $this->resetErrorBag();
        $this->createAndEditModalVisibility = true;
    }

    public function create()
    {
        $this->authorize(ClanWarPolicy::CREATE, ClanWarModel::class);

        $this->validate();
        ClanWarModel::create($this->modelData());
        $this->reset();
        session()->flash('success', 'Game added.');
        $this->createAndEditModalVisibility = false;

    }

    public function read(): Collection
    {
        $clanWars = ClanWarModel::orderByDesc('date')->get();

        foreach($clanWars as $clanWar)
        {
            $clanWar->results = $this->clanWarResult($clanWar);
        }

        return $clanWars;
    }

    public function showEditModal($id): Void
    {
        $this->modelId = $id;
        $this->loadModel();
        $this->resetErrorBag();
        $this->createAndEditModalVisibility = true;
    }

    public function update():void
    {
        $this->authorize(ClanWarPolicy::UPDATE, $this->clanWar);
        $this->validate();

        $this->clanWar->title = $this->title;
        $this->clanWar->date = Carbon::createFromFormat('Y-m-d\TH:i', $this->date)->format('Y-m-d H:i:s');
        $this->clanWar->save();

        session()->flash('success', 'Clan war updated.');
        $this->reset();
        $this->createAndEditModalVisibility = false;

    }

    public function loadModel(): Void
    {
        if($this->modelId != NULL)
        {
            $data = ClanWarModel::findOrFail($this->modelId);
            $this->title = $data->title;
            $this->date = $data->date->format('Y-m-d\TH:i');
            $this->clanWar = $data;
        }
    }

    public function modelData(): Array
    {
        return [
            'title' => $this->title,
            'date'  => $this->date,
            'user_id' => auth()->user()->id,
        ];
    }

    public function render()
    {
        return view('livewire.clan-war.clan-war', [
            'clanWars' => $this->read(),
        ]);
    }
}
