<x-app-layout>
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
        {{-- <div id="toolbar" class="mb-4">
            <!-- Add font size dropdown -->
            <select class="ql-size">
                <option value="small"></option>
                <!-- Note a missing, thus falsy value, is used to reset to default -->
                <option selected></option>
                <option value="large"></option>
                <option value="huge"></option>
            </select>
            <!-- Add a bold button -->
            <button class="ql-bold"></button>
            <!-- Add subscript and superscript buttons -->
            <button class="ql-script" value="sub"></button>
            <button class="ql-script" value="super"></button>
        </div> --}}
        <div id="editor" class="">
            {{-- ここにインポートしたHTMLのDOMを埋め込めばエディタに初期表示される --}}
            @if (!empty($modified_html))
                {!! $modified_html !!}
            @endif
        </div>
    </div>


</x-app-layout>
