<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specification extends Model
{

    protected $guarded = [];

    public function project(){
    
        $this->belongsTo('App\project');
    }

    public function documentations(){
    
        $this->hasMany('App\documentation');
    }
}
