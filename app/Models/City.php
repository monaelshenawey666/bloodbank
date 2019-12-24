<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name','governrate_id');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governrate','governrate_id');
    }

}