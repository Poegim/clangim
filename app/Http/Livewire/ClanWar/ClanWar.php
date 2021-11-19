<?php

namespace App\Http\Livewire\ClanWar;

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

    public $createModalVisibility = false;
    public $deleteModalVisibility = false;

    public $modelId;
    public $clanWar;

    public $title;
    public $date;
    public $user_id;

    public function rules(): array
    {
        return [
            'title' => [
                'required', 
                'string',
                Rule::unique('clan_wars'),
            ],
            'date' => ['required'],
        ];
    }

    public function showCreateModal(): void
    {
        $this->authorize(ClanWarPolicy::CREATE, ClanWarModel::class);
        $this->title = null;
        $this->date = null;
        $this->resetErrorBag();
        $this->createModalVisibility = true;
    }

    public function create()
    {
        $this->authorize(ClanWarPolicy::CREATE, ClanWarModel::class);

        $this->validate();
        ClanWarModel::create($this->modelData());
        $this->reset();
        session()->flash('success', 'Game added.');
        $this->createModalVisibility = false;

    }

    public function read(): Collection
    {
        $clanWars = ClanWarModel::all();
        return $clanWars;
    }

    public function showEditModal($id): Void
    {
        $this->modelId = $id;
        $this->loadModel();
        $this->resetErrorBag();
        $this->createModalVisibility = true;
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
        $this->createModalVisibility = false;


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
