<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documentation extends Model
{
    protected $guarded = [];
    
    public function project(){
    
       return $this->belongsTo('App\project');
    }

    public function specification(){
    
        return $this->belongsTo('App\specification', 'SpecificationId');
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

    public function cableList(){
    
        return $this->belongsTo('App\cablelist');
    }

    public function cableListElements(){

        return $this->belongsTo('App\cableListElement');
    }

}
