import 'quill/dist/quill.snow.css';
import Quill from 'quill';

const toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],
    ['link', 'image', 'video', 'formula'],
  
    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction
  
    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  
    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],
  
    ['clean']                                         // remove formatting button
  ];

const quill = new Quill('#editor', {
    modules :{
        toolbar: toolbarOptions
    },
    theme: 'snow',
});

// バックエンドでの発火を契機に、エディタにアップされたHTMLを反映する
document.addEventListener('livewire:init', () => {
    Livewire.on('fileUploaded', function (file) {
        // console.log(file.html);
        quill.clipboard.dangerouslyPasteHTML(file.html);
    })
})