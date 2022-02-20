<?php

namespace App\Http\Livewire\Team\Settings;

use Livewire\Component;
use App\Models\Team\Setting;

class Description extends Component
{
    public $setting;
    public $description;

    public function mount()
    {
        $this->setting = Setting::where('name', '=', 'description')->first();
        $this->description = $this->setting->value;
    }

    public function rules()
    {
        return [
            'description' => 'string', 'nullable',
        ];
    }

    public function save()
    {
        $this->setting->value = $this->description;
        $this->setting->save();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.team.settings.description');
    }
}
