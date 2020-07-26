<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documentation extends Model
{
    public function project(){
    
        $this->belongsTo('App\project');
    }

    public function specification(){
    
        $this->belongsTo('App\specification');
    }

    public function measurment(){
    
        $this->belongsTo('App\measurment');
    }

    public function docuCategory(){
    
        $this->belongsTo('App\docuCategory');
    }

    public function docuObject(){
    
        $this->belongsTo('App\docuObject');
    }

    public function docuFloor(){
    
        $this->belongsTo('App\docuFloor');
    }

    public function docuRoom(){
    
        $this->belongsTo('App\docuRoom');
    }

}
