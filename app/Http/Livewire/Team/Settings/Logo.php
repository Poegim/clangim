<?php

namespace App\Http\Livewire\Team\Settings;

use Livewire\Component;
use App\Models\Team\Setting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Livewire\Redirector;

class Logo extends Component
{
    use WithFileUploads;

    public $setting;
    public $logo;
    public $photo;

    public function mount()
    {

        $this->setting = Setting::where('name', '=', 'logo')->first();
        $this->logo = $this->setting->value;

    }

    public function save(): Redirector
    {
        $this->validate([
            'photo' => [
                'image',
                'max:1024',
                'mimes:jpg,jpeg,png',
            ],
        ]);

        $this->photo->storeAs('public/logo', 'logo.jpg');
        $this->setting->value = 'logo/logo.jpg';
        $this->setting->save();
        $this->logo = $this->setting->value;
        $this->emit('saved');
        return redirect()->route('team.settings');
    }

    public function delete(): void
    {
        if($this->setting->value != null)
        {
            $this->setting->value = null;
            $this->setting->save();
            File::move('storage/logo/logo.jpg', 'storage/logo/oldlogo.jpg');
            $this->emit('deleted');
            $this->logo = null;
        }

    }

    public function recoverOldLogo()
    {
        if(File::exists('storage/logo/oldlogo.jpg'))
        {
            File::move('storage/logo/oldlogo.jpg', 'storage/logo/logo.jpg');
            $this->setting->value = 'logo/logo.jpg';
            $this->setting->save();
            $this->emit('saved');
            redirect()->route('team.settings');
        }

    }

    public function render()
    {
        return view('livewire.team.settings.logo');
    }
}
