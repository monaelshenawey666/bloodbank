<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone','patient_age','bages_num', 'hospital_name', 'details', 'longitude','latitude','hospital_address',
    'city_id','blood_type_id', 'client_id');
//    protected $with = ['client','bloodType','city.governorate'];

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodtype()
    {
        return $this->belongsTo('App\Models\BloodType','blood_type_id');
    }


    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }



   /* public function governrates()
    {
        return $this->hasManyThrough( Governrate::class,City::class );
    }*/
}
