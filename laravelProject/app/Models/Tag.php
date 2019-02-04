<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Tag extends Model
{
    //
    public function scopeArticles()
    {
        // return $this->belongsToMany(Article::class, 'article_tag');
        // return $this->belongsToMany('App\Models\Article', 'article_tag');
        return $this->belongsToMany(Article::class);
    }
}
