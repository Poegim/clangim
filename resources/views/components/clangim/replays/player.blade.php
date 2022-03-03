<div
    class="col-span-2 md:col-span-1 mt-2 rounded-md dark:text-gray-300"
    >
    <div>
        Player: <span class="font-extrabold text-lg text-black dark:text-gray-200">{{ $player->name }}</span>
    </div>
    <div>
        APM: <span class="font-semibold">{{ $player->apm }}</span>
    </div>
    <div>
        EAPM: <span class="font-semibold">{{ $player->eapm }}</span>
    </div>
    <div>
        Race: <span class="font-semibold">{{ $player->race}}</span>
    </div>
    <div class="{{ $player->team }} bg-gradient-to-r h-2">
    </div>
</div>
