<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cableList extends Model
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
}
