<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class User extends Model
{
    //
    protected $fillable = ['profile'];

    public function routeEdit()
    {
        return route("edit.user" , ["userName" => $this->name ]);
    }
}
