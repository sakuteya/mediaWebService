<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Tag extends Model
{
    //
    public function Articles()
    {
        return $this->belongsToMany(Article::class);
    }

    // public function scopeTagArticles($query)
    // {
    //     return $query->belongsToMany(Article::class);
    // }
}
