<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cablelist extends Model
{
    protected $guarded = [];

    public function project(){
    
        return $this->belongsTo('App\project');
    }

    public function docuObject(){
    
        return $this->belongsTo('App\DocuObject');
    }

    public function docuCategories(){
    
        return $this->belongsTo('App\DocuCategory');
     }

    public function documentations(){

        return $this->hasMany('App\documentation');
    }

    public function cableListElements(){

        return $this->hasMany('App\cableListElement');
    }
}
