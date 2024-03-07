<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class html-uploader extends Component {
    public $file;

    public function handleFileUpload() {
        dd($file);
        $htmlContent = file_get_contents($this->file->path());

        // HTMLをEditor.jsのブロック形式に変換
        $blocks = [
            [
                'type' => 'paragraph',
                'data' => [
                    'text' => $htmlContent,
                ],
            ],
        ];

        // 変換したブロックをビューに渡す
        return view('livewire.html-uploader', [
            'blocks' => $blocks,
        ]);
    }
}
?>
