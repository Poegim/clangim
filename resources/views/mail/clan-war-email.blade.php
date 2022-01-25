@component('mail::message')
# Clan War is coming!

Hello, at <b>{{$clanWar->date}}</b>, we are gona play <b>"{{$clanWar->title}}".</b>
Take my Axe and come.

@component('mail::button', ['url' => env('APP_URL').'/clan-wars/'.$clanWar->id])
Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
