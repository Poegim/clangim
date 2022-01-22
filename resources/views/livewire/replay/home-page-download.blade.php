<div title="Downloads" class="mr-1 ml-2 w-1/3">
    <button class="text-sm font-semibold focus:text-gray-600 hover:text-gray-600"
    wire:click='download()' {{ $disabled == 1 ? 'disabled' : '' }}
    onClick="this.disabled=true;"
    >
    <x-clarity-download-cloud-line class="inline w-5 h-5"/>
        {{$replay->downloads_counter}}
    
    </button>
</div>


