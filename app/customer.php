<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public function projects(){
    
        return $this->hasMany('App\project', 'CustomerId');
    }
}
