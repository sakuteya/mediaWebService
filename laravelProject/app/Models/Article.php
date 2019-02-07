<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

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

    public function routeUser()
    {
        return route("user" , ["userName" => $this->user->name ]);
    }

    public function routeArticle()
    {
        return route("article" , ["userName" => $this->user->name , "title" => $this->title ]);
    }

}
