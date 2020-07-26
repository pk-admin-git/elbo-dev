<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocuObject extends Model
{
    public function project(){
    
        $this->belongsTo('App\project');
    }

    public function documentations(){
    
        $this->hasMany('App\documentation');
    }
}
