<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editor
        </h2>
    </x-slot>

    {{-- Livewire埋め込み --}}
    @livewire('html-uploader')

    <div id="editor">
        {{-- ここにインポートしたHTMLのDOMを埋め込めばエディタに初期表示される --}}

    </div>

</x-app-layout>
