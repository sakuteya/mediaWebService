<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
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
    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->favorite_count = 0;
        $post->save();

        $article = Article::find($post->id);
        $article->tags()->createMany([
            [
                'tag_name' => $request->tag0,
            ],
            [
                'tag_name' => $request->tag1,
            ],
        ]);




        return view('post');
    }
}
