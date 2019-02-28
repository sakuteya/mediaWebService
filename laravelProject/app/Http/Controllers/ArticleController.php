<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use App\Models\Favorite;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;


class ArticleController extends Controller
{

    public function index(string $userName, string $title){
        //対象記事がなければ404を返す。
        $userId = User::where('name', $userName)->firstOrFail()->id;
        $article = Article::where('user_id', $userId)->where('title', $title)->firstOrFail();
        return view('article', compact('article'));
    }

    /**
     *
     * @return Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        //TODO:post>>articleへなおす
        $post = new Article;
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

    public function listIndex(){

        $vArticles;

        if (is_null(request('tag'))) {
            $vArticles = Article::paginate(10);
        }else {
            $tag = Tag::where('tag_name', request('tag'))->firstOrFail();
            $vArticles = $tag->articles()->paginate(10);
        }

        return view('listArticles', compact('vArticles'));
    }

    public function addFavorite(Request $request)
    {
        $favorite = new Favorite;
        $favorite->article_id = $request->article_id;
        $favorite->user_id = Auth::id();
        $favorite->save();

        return back();
    }

    public function deleteFavorite(Request $request)
    {
        Favorite::where('article_id', $request->article_id)->where('user_id', Auth::id())->delete();

        return back();
    }

    public function addComment(Request $request)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return back();
    }

}
