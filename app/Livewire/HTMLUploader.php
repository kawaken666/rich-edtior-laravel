<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\DomCrawler\Crawler;

class HtmlUploader extends Component
{
    use WithFileUploads;

    /**
     * property
     */
    public $file;
    public $folder;

    /**
     * アップロードされたフォルダをエディタに反映できるように操作してイベントを発火する
     */
    public function handleFolderUpload() {
        // dd($this->folder);
        


        // $tmpFolder = file_get_contents($this->folder->getPathname());

        // $modifiedHtml = $this->formatHtmlForEditor($html);
        
        // $this->dispatch('folderUploaded', folder: $modifiedHtml);
    } 

    /**
     * リッチエディタに反映できるようにHTMLを整形する
     */
    private function formatHtmlForEditor($file) {
        // アップロードされたHTMLを取得
        $uploadFile = file_get_contents($file->getPathname());

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
        
        return $modifiedHtml;
    }      
}
