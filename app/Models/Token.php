<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    protected $table = 'tokens';
    public $timestamps = true;
    protected $fillable = array('name','token');

    public function clients()
    {
        return $this->belongsTo('App\Models\Client');
    }


}
