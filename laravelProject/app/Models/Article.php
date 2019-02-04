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

    /**
     * タグでフィルタリング
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $tag
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTagFilter($query, ?string $tag)
    {
        if (!is_null($tag)) {
            return $query->where('tag', $tag)->articles();
            // $userId = User::where('name', $userName)->firstOrFail()->id;

        }
        return $query;
    }
}
