<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documentation extends Model
{
    public function project(){
    
       return $this->belongsTo('App\project');
    }

    public function specification(){
    
        return $this->belongsTo('App\specification');
    }

    public function measurment(){
    
        return $this->belongsTo('App\measurment');
    }

    public function docuCategory(){
    
        return $this->belongsTo('App\docuCategory');
    }

    public function docuObject(){
    
        return $this->belongsTo('App\docuObject');
    }

    public function docuFloor(){
    
        return $this->belongsTo('App\docuFloor');
    }

    public function docuRoom(){
    
        return $this->belongsTo('App\docuRoom');
    }

}
