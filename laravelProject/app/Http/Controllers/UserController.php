<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index($userName){
        //対象ユーザがいなければ404を返す。
        $user = User::where('name', $userName)->firstOrFail();
        $vUserName = $user->name;
        $vProfile = $user->profile;

        //ユーザの記事一覧
        $vArticels = Article::where('user_id', [$user->id])->get();
        return view('user', compact('vUserName', 'vProfile', 'vArticels'));
    }
}
