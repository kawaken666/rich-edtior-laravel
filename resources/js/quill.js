import 'quill/dist/quill.snow.css';
import Quill from 'quill';

const quill = new Quill('#editor', {
    theme: 'snow',
});

// バックエンドでの発火を契機に、エディタにアップされたHTMLを反映する
document.addEventListener('livewire:init', () => {
    Livewire.on('fileUploaded', function (file) {
        console.log(file.html);
        quill.clipboard.dangerouslyPasteHTML(file.html);
    })
})