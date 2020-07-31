<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{

    protected $guarded = [];

    public function users(){
    
        $this->belongsToMany('App\user');
    }

    public function customer(){
    
        return $this->belongsTo('App\customer', 'CustomerId');
    }

    public function workrecords(){
    
        $this->hasMany('App\workrecord');
    }

    public function specifications(){
    
        $this->hasMany('App\specification');
    }

    public function measurments(){
    
        $this->hasMany('App\measurment');
    }

    public function docuCategories(){
    
        return $this->hasMany('App\docuCategory');
    }

    public function docuObjects(){
    
        $this->hasMany('App\docuObject');
    }

    public function docuFloors(){
    
        $this->hasMany('App\docuFloor');
    }

    public function docuRooms(){
    
        $this->hasMany('App\docuRoom');
    }

    public function documentations(){
    
        $this->hasMany('App\documentation');
    }
}
