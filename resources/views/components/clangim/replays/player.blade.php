<div 
    class="col-span-2 md:col-span-1 mt-2 rounded-md"
    >
    <div>
        Player: <span class="font-semibold">{{ $player->name }}</span>
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