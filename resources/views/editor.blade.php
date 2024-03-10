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

    <script>
        // バックエンドで発火されたイベントをリスナーしてquillに反映
        document.addEventListener('livewire:init', () => {
            Livewire.on('htmlUploaded', function (html) {
                quill.clipboard.dangerouslyPasteHTML(html);
            })
        })
    </script>
</x-app-layout>
