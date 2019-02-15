<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(string $userName, string $title){
        //対象記事がなければ404を返す。
        $userId = User::where('name', $userName)->firstOrFail()->id;
        $article = Article::where('user_id', $userId)->where('title', $title)->firstOrFail();
        return view('article', compact('article'));
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

}
