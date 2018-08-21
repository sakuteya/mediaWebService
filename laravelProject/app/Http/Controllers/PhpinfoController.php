<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhpinfoController extends Controller
{
    //
    public function index(){
        return view('phpinfo');
    }
}
