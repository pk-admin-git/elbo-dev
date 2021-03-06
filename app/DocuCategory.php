<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocuCategory extends Model
{
    protected $guarded = [];

    public function project(){
    
        return $this->belongsTo('App\project');
    }

    public function documentations(){
    
        return $this->hasMany('App\documentation');
    }
}
