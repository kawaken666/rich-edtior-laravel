import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import Quote from '@editorjs/quote';
import ImageTool from '@editorjs/image';
import NestedList from '@editorjs/nested-list';
import LinkTool from '@editorjs/link';
import Table from '@editorjs/table'

let editor = new EditorJS({
    /**
     * Id of Element that should contain Editor instance
     */
    holder: 'editorjs',
    tools: {
        header: Header,
        class: Quote,
        image: {
            class: ImageTool,
            // config: {
            //     endpoints: {
            //       byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
            //       byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
            //     }
            // }
        },
        list: {
            class: NestedList,
            inlineToolbar: true,
            config: {
                defaultStyle: 'unordered'
            }
        },
        linkTool: {
            class: LinkTool,
            // config: {
            //   endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching,
            // }
        },
        table: Table,
    }
});

window.addEventListener('livewire:load', function () {
    editor.data = JSON.stringify(blocks);
});