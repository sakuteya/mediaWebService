<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    public function index($userName){
        //対象ユーザがいなければ404を返す。
        $user = User::where('name', $userName)->firstOrFail();

        //ユーザの記事一覧
        $articles = Article::where('user_id', [$user->id])->paginate(10);
        return view('user', compact('user', 'articles'));
    }

    public function edit(string $userName)
    {
        $user = User::where('name', $userName)->firstOrFail();
        // $article = Article::where('user_id', $userId)->where('title', $title)->firstOrFail();
        // $this->authorize('update', $article);

        return view('userPage.edit', compact('user'));
    }

    public function update(UserRequest $request)
    {
        $user = User::findOrFail(Auth::id());
        // $this->authorize('update', $article);

        $user->update($request->validated());

        return redirect()->route('user', ["userName" => $user->name ]);
    }

}
