<div title="Downloads" class="mr-1 w-1/3">
    <button class="text-sm font-semibold focus:text-gray-600 hover:text-gray-600 dark:hover:text-gray-200 dark:focus:text-gray-200"
    wire:click='download()' {{ $disabled == 1 ? 'disabled' : '' }}
    onClick="this.disabled=true;"
    >
    <x-clarity-download-cloud-line class="inline w-5 h-5"/>
        {{$replay->downloads_counter}}

    </button>
</div>


