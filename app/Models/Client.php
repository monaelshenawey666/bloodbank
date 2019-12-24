<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone','email', 'password', 'name','blood_type_id', 'date_of_birth', 'last_donation_date', 'city_id', 'api_token','pin_code');

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function governorates()
    {
        return $this->morphedByMany('App\Models\Governrate','clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany('App\Models\Notification','clientable')->withPivot('is_read');
    }

    public function blood_types()
    {
        return $this->morphedByMany('App\Models\BloodType','clientable');
    }
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post','clientable');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }



    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

    protected $hidden = [
        'password','api_token',
    ];

}
