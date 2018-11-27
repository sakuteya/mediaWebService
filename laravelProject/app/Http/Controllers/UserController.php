<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index($userName){
        //対象ユーザがいなければ404を返す。
        $user = User::where('name', $userName)->firstOrFail();
        $vUserName = $user->name;
        $vEmail = $user->email;
        return view('user', compact('vUserName', 'vEmail'));
    }
}
