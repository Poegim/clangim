<div>
    <button class="text-sm font-semibold text-indigo-700"
            wire:click='download()' {{ $disabled == 1 ? 'disabled' : '' }}
            onClick="this.disabled=true;"
    >
            Download ({{$downloadsCounter}})
        
    </button>
</div>
