<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class HtmlUploader extends Component
{
    use WithFileUploads;

    public $file;
    public $str;
    public $blocks;

    public function handleFileUpload() {
        // アップロードされたファイルを一時ストレージに保存する
        $this->file->store('uploads');

        // // HTMLをEditor.jsのブロック形式に変換
        // $this->blocks = [
        //     [
        //         'type' => 'paragraph',
        //         'data' => [
        //             'text' => $this->file,
        //         ],
        //     ],
        // ];
        
        $this->dispatch('file-uploaded');
    }      
}
