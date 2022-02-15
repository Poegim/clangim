<div>
    <button class="text-sm font-semibold text-indigo-700 hover:text-indigo-900 dark:text-indigo-200 dark:hover:text-indigo-400"
            wire:click='download()' {{ $disabled == 1 ? 'disabled' : '' }}
            onClick="this.disabled=true;"
    >
            Download ({{$downloadsCounter}})

    </button>
</div>
