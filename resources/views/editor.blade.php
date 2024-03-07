<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editor
        </h2>
    </x-slot>

    <form wire:submit.prevent="handleFileUpload" enctype="multipart/form-data">
        <input type="file" wire:model="file" accept=".html">
        <x-primary-button>アップロード</x-primary-button>
    </form>

    <div id="editorjs" class="bg-neutral-300 rounded-lg m-8 p-4"></div>

</x-app-layout>
