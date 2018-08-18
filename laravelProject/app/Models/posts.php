<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class posts extends Model
{
    protected $table = 'articles';

    //idなら主キーは自動設定されるらしい。（なくてもよい）
    protected $guarded = array('id');

    public $timestamps = true;

    public function getData()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }
}
