<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(string $userName, string $title){
        //対象記事がなければ404を返す。
        $userId = User::where('name', $userName)->firstOrFail()->id;
        $articel = Article::where('user_id', $userId)->where('title', $title)->firstOrFail();
        $vTitle = $articel->title;
        $vBody = $articel->body;
        return view('article', compact('vTitle', 'vBody'));
    }

    public function listIndex(){

        $vArticels = Article::tagFilter(request('tag'))->paginate(10);

        return view('listArticles', compact('vArticels'));
    }

}
