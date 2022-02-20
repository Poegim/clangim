<?php

namespace App\Http\Livewire\Team\Settings;

use Livewire\Component;
use App\Models\Team\Setting;
use Livewire\Redirector;

class Colors extends Component
{

    public $color1;
    public $color2;
    public $color3;
    public $color4;
    public $color1value;
    public $color2value;
    public $color3value;
    public $color4value;

    public function mount()
    {
        $this->color1 = Setting::where('name', '=', 'color1')->first();
        $this->color2 = Setting::where('name', '=', 'color2')->first();
        $this->color3 = Setting::where('name', '=', 'color3')->first();
        $this->color4 = Setting::where('name', '=', 'color4')->first();
        $this->color1value = $this->color1->value;
        $this->color2value = $this->color2->value;
        $this->color3value = $this->color3->value;
        $this->color4value = $this->color4->value;
    }

    public function rules()
    {
        return [
            'color1' => 'required',
            'color2' => 'required',
            'color3' => 'required',
            'color4' => 'required',
        ];
    }

    public function save(): Redirector
    {
        $this->color1->value = $this->color1value;
        $this->color1->save();
        $this->color2->value = $this->color2value;
        $this->color2->save();
        $this->color3->value = $this->color3value;
        $this->color3->save();
        $this->color4->value = $this->color4value;
        $this->color4->save();
        $this->emit('saved');
        return redirect()->route('team.settings');
    }

    public function render()
    {
        return view('livewire.team.settings.colors');
    }
}
