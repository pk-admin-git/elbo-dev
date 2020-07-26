<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measurment extends Model
{
    public function project(){
    
        $this->belongsTo('App\project');
    }

    public function documenations(){
    
        $this->hasMany('App\documentation');
    }
}
