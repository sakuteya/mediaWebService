<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

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

  /**
     * 新ブログポスト作成フォームの表示
     *
     * @return Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * 新しいブログポストの保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // ブログポストのバリデーションと保存コード…
        $validatedData = $request->validate([
          'title' => 'required|unique:posts|max:255',
          'body' => 'required',
        ]);
    }
}