<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\DomCrawler\Crawler;

class HtmlUploader extends Component
{
    use WithFileUploads;

    public $file;
    public $str;
    public $blocks;

    public function handleFileUpload() {
        // アップロードされたHTMLを取得
        $uploadFile = file_get_contents($this->file->getPathname());

        // DOMパーサーでHTMLを解析
        $crawler = new Crawler($uploadFile);

        // scriptタグを削除
        $crawler->filter('script')->each(function ($node) {
            $node->getNode(0)->parentNode->removeChild($node->getNode(0));
        });

        // styleタグを削除
        $crawler->filter('style')->each(function ($node) {
            $node->getNode(0)->parentNode->removeChild($node->getNode(0));
        });

        // 修正されたHTMLを取得
        $modifiedHtml = $crawler->html();
        
        $this->dispatch('fileUploaded', html: $modifiedHtml);
    }      
}
