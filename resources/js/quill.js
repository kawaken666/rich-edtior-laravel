import 'quill/dist/quill.snow.css';
import Quill from 'quill';

const quill = new Quill('#editor', {
    theme: 'snow',
  });

// バックエンドで発火したイベントをリッスンしてエディタにアップされたHTMLを反映する
document.addEventListener('livewire:init', () => {
    Livewire.on('fileUploaded', function (html) {
        console.log(html);
        quill.clipboard.dangerouslyPasteHTML(html); // ここでエラー発生。おそらくhtmlテキストが適切な形式で渡せていない。
    })
})