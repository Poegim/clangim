<!-- component -->
<div class="p-1 tracking-wider">

    <div class="bg-gray-200 rounded-md flex justify-center items-center flex-col p-2 {{config('settings.color3')}}">

        <div
            class="relative shadow-lg shadow-purple-200 w-full rounded bg-gradient-to-bl {{ $player->teamRaceBackground() }} overflow-hidden flex flex-col justify-center items-center p-4">
            <img class="w-32 h-32 w- object-cover rounded-full mb-2 z-30" src="{{ $player->profile_photo_url }}" alt="logo">
            <img src="{{asset('images/races/'.$player->race.'.png')}}" alt="" class="absolute opacity-10 z-20 h-96">
        <p class="text-white text-2xl font-semibold z-30">{{ $player->name }}</p>
        </div>

        <div class="text-gray-100 shadow-lg shadow-gray-300 w-full bg-gradient-to-br from-gray-800 to-gray-400 p-4 rounded mt-2 relative">
        <p class="font-bold">{{$player->name}} <img src="{{ asset($player->countryFlagURL()) }}"
            alt="{{ $player->country }}"
            class="rounded-full h-5 w-5 object-cover inline mb-1"></p>
        <p class="my-1 text-sm">
            {{$player->role()}}
        </p>
        <p class="my-1 text-sm">
            Joined: {{ $player->createdAt() }}
        </p>
        <p class="text-sm my-1">BattleID: {{ $player->battleid }}</p>
        <p class="text-sm my-1">ShieldBattery ID: {{ $player->shieldid }}</p>
        <p>
            <span class="text-md font-extrabold absolute right-4 top-4 tracking-wider">Ingame race: {{ $player->ingameRace()}}</span>
        </p>

        </div>

    </div>
</div>
