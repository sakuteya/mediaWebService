<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testSakController extends Controller
{
    public function index()
  {
    // 配列の初期化
    $data = array();

    // データ格納
    $data['name'] = 'sak';
    $data['message'] = 'こんにちは';

    // 現在日時
    $today = date('Y年m月d日 H:i:s');

    return view('testSak', ['data' => $data, 'today' => $today]);
  }
}
