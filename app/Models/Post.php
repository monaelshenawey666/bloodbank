<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'category_id','user_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
////////////////////////////////////////////////////////////////////////////////////////////
    public function getIsFavouriteAttribute()
    {
        $client =  auth('client-web')->user();
        if (!$client)
        {
            $client =  auth('api')->user();
        }
        if ($client)
        {
            $favourite = Post::whereHas('clients' , function ($q) use($client) {
                $q->where('clientables.client_id' ,$client->id);
                $q->where('clientables.clientable_id' , $this->id);
            })->first() ;
            if ($favourite){
                return true ;
            }
        }
        return false;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////

    public function clients()
    {
        return $this->morphToMany('App\Models\Client','clientable');
    }

}
