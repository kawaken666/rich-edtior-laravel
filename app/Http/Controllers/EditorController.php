<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    // 暫定ローカルストレージパス（あるべきは環境ごとにenvなどに外出し）
    const LOCAL_STORAGE_DIR = 'http://[::1]:5173/storage/app/';

    public function index()
    {
        return view('editor');
    }

    public function upload(Request $request)
    {
        // アップされたUploadedFileインスタンスを取得
        $uploaded_file = $request->file('folders');

        // HTMLファイルの入れ物
        $upload_html = '';

        // 画像保存処理
        for ($i = 0; $i < count($uploaded_file); $i++) {
            // 保存対象のMIME
            $save_MIME = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff', 'image/webp', 'image/svg+xml'];

            // HTMLのMIME
            $HTML_MIME = ['text/html'];

            // 保存対象のMIMEの場合は保存する
            if (in_array($_FILES['folders']['type'][$i], $save_MIME)) {

                $uploaded_file[$i]->storeAs(dirname($_FILES['folders']['full_path'][$i]), $uploaded_file[$i]->getClientOriginalName());
            }

            // 後続使用のためHTMLは変数に入れておく
            if (in_array($_FILES['folders']['type'][$i], $HTML_MIME)) {
                $upload_html = $uploaded_file[$i];
            }
        }

        // アップロードフォルダの第一階層ディレクトリ名を取得（HTMLファイルのimgタグのsrcをサーバー上のファイルを参照するよう修正するため）
        $firstDirectory = explode('/', $_FILES['folders']['full_path'][0])[0];

        // ストレージパスを結合
        $firstDirectory = self::LOCAL_STORAGE_DIR.$firstDirectory;

        // HTMLを整形
        $modified_html = $this->formatHtmlForEditor($upload_html, $firstDirectory);

        return view('editor', ['modified_html' => $modified_html]);
    }

    /**
     * HTMLを整形する
     */
    private function formatHtmlForEditor($html, $firstDirectory)
    {
        // アップロードされたHTMLコンテンツを取得
        $content = file_get_contents($html->getPathname());

        // HTMLをパースしてDOMツリーを構築
        $dom = new DOMDocument();
        $dom->loadHTML($content);

        // すべてのimgタグを取得
        $imgs = $dom->getElementsByTagName('img');

        // 各imgタグのsrc属性を書き換える
        foreach ($imgs as $img) {
            $src = $img->getAttribute('src');
            // 新しいディレクトリパスをsrc属性に結合
            $newSrc = $firstDirectory.'/'.$src;
            $img->setAttribute('src', $newSrc);
        }

        // body配下のnode以外をすべて削除する
        // body 要素を取得
        $body = $dom->getElementsByTagName('body')->item(0);

        // 修正したdomで保存してXMLで書き出し（saveHTMLだとHTMLエンティティエンコードがされてしまうのでエディタに反映できない）
        $modified_html = $dom->saveXML($body);

        // 先頭行のXML宣言を削除（XMLだとエディタ表示できない）
        $modified_html = preg_replace('/^.+\n/', '', $modified_html);

        return $modified_html;
    }
}
