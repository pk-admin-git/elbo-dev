<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{

    protected $guarded = [];

    public function users(){
    
        return $this->belongsToMany('App\user');
    }

    public function customer(){
    
        return $this->belongsTo('App\customer', 'CustomerId');
    }

    public function workrecords(){
    
        return $this->hasMany('App\workrecord');
    }

    public function specifications(){
    
        return $this->hasMany('App\specification');
    }

    public function measurments(){
    
        return $this->hasMany('App\measurment');
    }

    public function docuCategories(){
    
        return $this->hasMany('App\docuCategory');
    }

    public function docuObjects(){
    
        return $this->hasMany('App\docuObject');
    }

    public function docuFloors(){
    
        return $this->hasMany('App\docuFloor');
    }

    public function docuRooms(){
    
        return $this->hasMany('App\docuRoom');
    }

    public function documentations(){
    
        return $this->hasMany('App\documentation');
    }
}
