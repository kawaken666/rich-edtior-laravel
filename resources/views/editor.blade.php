<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editor
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('editor.upload') }}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="file" wire:model="file"> --}}
        <input type="file" id="folderInput" name="folders[]" directory webkitdirectory mozdirectory multiple>
        <input type="hidden" id="folderPaths" name="folderPaths[]">
        <x-primary-button>アップロード</x-primary-button>
    </form>

    <div id="editor">
        {{-- ここにインポートしたHTMLのDOMを埋め込めばエディタに初期表示される --}}
        @if (!empty($modified_html))
            {!! $modified_html !!}
        @endif
    </div>

</x-app-layout>
