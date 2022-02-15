<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-400">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mt-12">

                <span>
                    <x-clarity-users-line class="w-16 h-16 text-blue-700 inline dark:text-gray-200" />
                </span>

            </div>
            <x-clangim.window :item="NULL">
                    <livewire:user.user />
            </x-clangim.window>
        </div>
    </div>
</x-app-layout>
