<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index(){
        return view('editor-test');
    }

    public function upload(Request $request){
        // アップされたUploadedFileインスタンスを取得
        $uploaded_file = $request->file('folders');

        // 保存
        // TODO 画像ファイル以外は不要なので保存しないようにする
        for($i = 0; $i < count($uploaded_file); $i++){
            $uploaded_file[$i]->storeAs(dirname($_FILES['folders']['full_path'][$i]), $uploaded_file[$i]->getClientOriginalName());
        }

        // TODO 上記で保存した画像を読み込むようにHTMLファイルのimgタグのsrcを修正する処理を実装
        // TODO 上記で修正したHTMLでQuillを初期化して表示する処理を実装（これはコントローラじゃなくてビューかも。非同期ではなくしたのでLivewireは不要。）
    }
}
