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
    
        return $this->belongsTo('App\DocuObject');
    }

    public function docuCategories(){
    
        return $this->hasMany('App\DocuCategory');
     }

    public function docuRooms(){
    
        return $this->hasMany('App\DocuRoom');
    }

    public function documentations(){
    
        return $this->hasMany('App\documentation');
    }
}
