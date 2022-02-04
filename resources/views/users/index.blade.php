<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="py-6 sm:px-12 border-b border-gray-200 bg-white">

                    <livewire:user.user />

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
