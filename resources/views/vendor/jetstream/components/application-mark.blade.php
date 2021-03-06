<div class="w-full flex space-x-2">

    @if (file_exists(public_path('storage/logo/logo.jpg')))

    <div class="inline rounded-full overflow-hidden">
        <img src="{{asset('storage/logo/logo.jpg')}}" alt="Logo" class="w-10 h-10 rounded-full object-cover float-left">
    </div>

    @else

    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
        <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"/>
        <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"/>
    </svg>

    @endif

    <div class="ml-2 inline:block sm:hidden lg:inline-block pt-2 font-semibold uppercase leading-tight">
        {{ env('APP_NAME') }}
        <p class="text-xs normal-case text-gray-500 -mt-1">
            {{config('settings.description')}}
        </p>
    </div>

</div>



