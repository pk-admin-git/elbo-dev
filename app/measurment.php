<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measurment extends Model
{
    protected $fillable = [
        'ProjectId', 'Number', 'Closed', 'Current'
    ];
    
    public function project(){
    
        return $this->belongsTo('App\project');
    }

    public function documenations(){
    
        return $this->hasMany('App\documentation');
    }
}
