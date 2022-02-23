<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Team\Setting;

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
        config()->set('settings', Setting::pluck('value', 'name')->all());
    }
}