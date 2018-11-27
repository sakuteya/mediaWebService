<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index($userName, $title){
        $userId = $userName;
        $articel = Article::where('title', $title)->firstOrFail();
        $vTitle = $articel->title;
        $vBody = $articel->body;
        return view('article', compact('vTitle', 'vBody'));
    }

    

}
