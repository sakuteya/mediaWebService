<?php

namespace App\Policies;

use App\User;
use App\Models\User as ModelUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * @param  \App\User  $user         ログインユーザー
     * @param  \App\Models\User  $model プロフィールページのユーザー
     * @return bool
     */
    public function update(User $user, ModelUser $model)
    {
        return $user->id === $model->id;
    }

}
