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
use App\Http\Controllers\Controller;


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
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = Auth::id();
        $article->favorite_count = 0;
        $article->save();

        $this->createTags($request, $article);

        return view('post', compact('article'));
    }

    private function createTags(ArticleRequest $request, Article $article)
    {
        $idTags = array();

        if ($request->filled('tag0')) {
            $idTags[] = Tag::firstOrCreate(['tag_name' => $request->tag0])->id;
        }
        if ($request->filled('tag1')) {
            $idTags[] = Tag::firstOrCreate(['tag_name' => $request->tag1])->id;
        }
        if ($request->filled('tag2')) {
            $idTags[] = Tag::firstOrCreate(['tag_name' => $request->tag2])->id;
        }
        if ($request->filled('tag3')) {
            $idTags[] = Tag::firstOrCreate(['tag_name' => $request->tag3])->id;
        }
        if ($request->filled('tag4')) {
            $idTags[] = Tag::firstOrCreate(['tag_name' => $request->tag4])->id;
        }

        $article->tags()->sync($idTags);

    }

    public function edit(string $userName, string $title)
    {
        $userId = User::where('name', $userName)->firstOrFail()->id;
        $article = Article::where('user_id', $userId)->where('title', $title)->firstOrFail();
        $this->authorize('update', $article);

        return view('post.edit', compact('article'));
    }

    public function update(ArticleRequest $request)
    {
        $article = Article::findOrFail($request->article_id);
        $this->authorize('update', $article);

        $article->update($request->validated());
        $this->createTags($request, $article);

        return redirect()->route('article', ["userName" => $article->user->name , "title" => $article->title ]);
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
