<?php

namespace App\Http\Controllers;

use App\Models\posts;

class postController extends Controller
{
  public function model()
  {
    // postsモデルのインスタンス化
    $md = new posts();
    // データ取得
    $data = $md->getData();

    // ビューを返す
    return view('posts', ['data' => $data]);
  }
}