<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cableListElement extends Model
{
    protected $guarded = [];
        
    public function cableList(){

        return $this->belongsTo('App\cableList');
    }
}