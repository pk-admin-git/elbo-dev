<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocuFloor extends Model
{
    protected $guarded = [];

    public function project(){
    
        return $this->belongsTo('App\project');
    }

    public function docuObject(){
    
        return $this->belongsTo('App\docuObject');
    }

    public function docuRooms(){
    
        return $this->hasMany('App\docuRoom');
    }

    public function documentations(){
    
        return $this->hasMany('App\documentation');
    }
}
