<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editor
        </h2>
    </x-slot>

    @livewire('html-uploader')

    <div id="editorjs" class="bg-neutral-300 rounded-lg m-8 p-4"></div>

</x-app-layout>
