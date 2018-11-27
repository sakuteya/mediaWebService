<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleController extends Controller
{
    
    public function index($userName, $title){

        // ユーザーが存在すれば、idを設定。
        $userId = '';
        if(DB::table('users')->where('name', $userName)->exists()) {
            $userId = DB::table('users')->where('name', $userName)->first()->id;
        }
        //対象記事がなければ404を返す。
        $articel = Article::where('user_id', $userId)->where('title', $title)->firstOrFail();
        $vTitle = $articel->title;
        $vBody = $articel->body;
        return view('article', compact('vTitle', 'vBody'));
    }

    

}
