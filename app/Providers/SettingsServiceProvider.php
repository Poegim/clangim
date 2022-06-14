<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Team\Setting;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Uncomment it after 1st migration.
        if(file_exists('../.env'))
        {
            if(Setting::first())
            {
                config()->set('settings', Setting::pluck('value', 'name')->all());
                config()->set('settings.email', User::pluck('email')->first());
            }
        }


    }
}
