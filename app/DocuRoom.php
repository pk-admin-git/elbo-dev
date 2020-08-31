<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocuRoom extends Model
{
    protected $guarded = [];
    
    public function project(){
    
        return $this->belongsTo('App\project');
    }

    public function docuFloor(){
    
        return $this->belongsTo('App\docuFloor');
    }

    public function documentations(){
    
        return $this->hasMany('App\documentation');
    }
}
