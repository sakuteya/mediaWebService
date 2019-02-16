<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Favorite;
use App\Models\Comment;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = true;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function routeUser()
    {
        return route("user" , ["userName" => $this->user->name ]);
    }

    public function routeArticle()
    {
        return route("article" , ["userName" => $this->user->name , "title" => $this->title ]);
    }

    public function isFavorite()
    {
        return Favorite::where('article_id', $this->id)->where('user_id', Auth::id())->exists();
    }

    public function countFavorite()
    {
        return Favorite::where('article_id', $this->id)->count();
    }
}
