<?php

namespace App\Policies;

use App\User;
use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * ユーザーにより指定されたポストが更新可能か決める
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return bool
     */
    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
