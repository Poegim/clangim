<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-alert 
    type="success" 
    class="bg-green-700 text-green-100 p-4" 
    x-data="{ show: true }" 
    x-show="show" 
    x-init="setTimeout(() => show = false, 3000)" 
    />

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    @include('layouts.blog')

</x-app-layout>
