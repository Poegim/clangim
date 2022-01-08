@if (session()->has('success'))
<div 
    class="p-4 text-white bg-green-500 grid grid-cols-2 fixed left-0 bottom-0 w-full z-10"
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-600"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-600"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0"
>
    
    <div>
        <x-clarity-success-line class="w-5 h-5 inline"/>
        <span>
            {{ session('success') }}
        </span>
    </div>
    <div class="text-right">
        <button @click="show = false" class="hover:text-red-700" >
            <x-clarity-remove-line class="w-5 h-5 inline"/>
        </button>
    </div>
</div>
@endif
