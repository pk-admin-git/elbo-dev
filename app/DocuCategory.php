<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocuCategory extends Model
{
    public function project(){
    
        return $this->belongsTo('App\project');
    }

    public function DocuObject(){
    
        return $this->belongsTo('App\DocuObject');
    }

    public function DocuFloor(){
    
        return $this->belongsTo('App\DocuFloor');
    }

    public function documentations(){
    
        return $this->hasMany('App\documentation');
    }
}
