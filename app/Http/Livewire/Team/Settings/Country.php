<?php

namespace App\Http\Livewire\Team\Settings;

use App\Http\Traits\HasCountry;
use App\Models\Team\Setting;
use Livewire\Component;

class Country extends Component
{
    use HasCountry;

    public $setting;
    public $country;

    public function mount(): void
    {
        $this->setting = Setting::where('name', '=', 'flag')->first();
        $this->country = $this->setting->value;
    }

    public function rules()
    {
        return [
            'country' => 'required',
        ];
    }

    public function save(): void
    {
        $this->setting->value = $this->country;
        $this->setting->save();
        $this->emit('saved');
    }


    public function render()
    {
        return view('livewire.team.settings.country');
    }
}
