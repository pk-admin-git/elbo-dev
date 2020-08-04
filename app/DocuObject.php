<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocuObject extends Model
{
    
   protected $guarded = [];

   public function project(){
    
       return $this->belongsTo('App\project');
   }

   public function docuFloors(){
    
      return $this->hasMany('App\docuObject');
   }


    public function documentations(){
    
       return $this->hasMany('App\documentation');
    }
}
