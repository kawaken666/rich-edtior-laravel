<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editor
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('editor.upload') }}" enctype="multipart/form-data" class="px-6 py-2">
        @csrf
        <input type="file" id="folderInput" name="folders[]" directory webkitdirectory mozdirectory multiple>
        <input type="hidden" id="folderPaths" name="folderPaths[]">
        <x-primary-button>アップロード</x-primary-button>
    </form>

    <div class="px-6 py-2">
        <div class="w-[393px] h-[852px]">
            <div id="editor" class="bg-white ">
                {{-- ここにインポートしたHTMLのDOMを埋め込めばエディタに初期表示される --}}
                @if (!empty($modified_html))
                    {!! $modified_html !!}
                @endif
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('editor.save') }}" id="submit-save" class="px-6 py-2">
        @csrf
        <input type="hidden" id="content" name="content" value="">
        <x-primary-button>保存</x-primary-button>
    </form>

    <script type="module">
        // TODO アセットのパスの環境差分の対応をする必要がある(https://stackoverflow.com/questions/75492352/how-to-change-vite-dev-server-asset-base-path)
        // import { getEditorContentHTML } from '/resources/js/quill.js';
        import {
            getEditorContentHTML
        } from 'http://[::1]:5173/resources/js/quill.js';

        document.getElementById('submit-save').addEventListener('submit', function(event) {
            // フォームの送信を停止
            event.preventDefault();

            // エディタのコンテンツをhiddenにセット
            const content = getEditorContentHTML();
            document.getElementById('content').value = content;

            console.log(document.getElementById('content').value);

            // フォームの送信を手動でトリガー
            this.submit();
        });
    </script>

</x-guest-layout>
