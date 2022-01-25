@component('mail::message')
# New post has been added.

Hello, <b>{{$post->user->name}}</b> writed new post called <b>"{{$post->title}}".</b>
Take my Bow and check.

@component('mail::button', ['url' => env('APP_URL').'/post/'.$post->slug])
Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
