<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navi extends Model
{
    protected $guarded = array('id');
    
    //必須条件
    public static $rules = array(
        'name' => 'required',
        'introduction' => 'required',
        );
}
