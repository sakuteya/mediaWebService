<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = true;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
}
