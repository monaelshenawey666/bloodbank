<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name','post_id');

    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }

}