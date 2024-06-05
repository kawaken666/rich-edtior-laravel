import 'quill/dist/quill.snow.css';
import Quill from 'quill';

const toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    [{ 'color': [] }, { 'background': [] }], 
    ['blockquote', 'link', 'image'],
    ['clean'],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'size': ['small', false, 'large', 'huge'] }],
];

const quill = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow',
});

// ツールバーの背景色を変更（tailwindはwhite以外効かない）
const toolbar = document.querySelector('.ql-toolbar');
toolbar.classList.add('bg-white');

// quillコンテンツをHTMLとして取得するメソッド
export function getEditorContentHTML() {
    return quill.root.innerHTML;;
}