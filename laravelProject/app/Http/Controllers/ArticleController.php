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
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = Auth::id();
        $article->favorite_count = 0;
        $article->save();

        $this->createTags($request, $article);

        return view('post', compact('article'));
    }

    private function createTags(ArticleRequest $request, Article $article){
        if ($request->filled('tag0')) {
            $article->tags()->create([
                'tag_name' => $request->tag0,
            ]);
        }
        if ($request->filled('tag1')) {
            $article->tags()->create([
                'tag_name' => $request->tag1,
            ]);
        }
        if ($request->filled('tag2')) {
            $article->tags()->create([
                'tag_name' => $request->tag2,
            ]);
        }
        if ($request->filled('tag3')) {
            $article->tags()->create([
                'tag_name' => $request->tag3,
            ]);
        }
        if ($request->filled('tag4')) {
            $article->tags()->create([
                'tag_name' => $request->tag4,
            ]);
        }
    }

    public function edit(string $userName, string $title) {
        $userId = User::where('name', $userName)->firstOrFail()->id;
        $article = Article::where('user_id', $userId)->where('title', $title)->firstOrFail();

        return view('post.edit', compact('article'));
    }

    public function update(ArticleRequest $request) {

        $article = Article::findOrFail($request->article_id);
        $article->update($request->validated());

        // return redirect(url('articles', [$article->id]));
        // return redirect($article->routeArticle);
        return back();
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
