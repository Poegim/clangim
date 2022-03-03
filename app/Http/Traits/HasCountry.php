<?php

namespace App\Http\Traits;

trait HasCountry
{
    public function countryFlagURL(): string
    {
        return asset('images/country_flags/'.strtolower($this->country).'.png');
    }

}
