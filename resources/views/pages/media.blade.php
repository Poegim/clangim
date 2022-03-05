<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Media') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <x-clangim.window :item="NULL">
                <p>Ingame races icons by <a href='https://www.pngegg.com'>www.pngegg.com</a></p>
                <p>Flags by <a href='https://www.freepik.com/vectors/icons'>Icons vector created by luis_molinero -
                        www.freepik.com</a></p>
            </x-clangim.window>
        </div>
    </div>
</x-app-layout>
