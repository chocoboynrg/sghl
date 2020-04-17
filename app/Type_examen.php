<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_examen extends Model
{
    protected $guarded = [];
    
    public function examens(){
        return $this->belongsToMany(Examen::class);
    }

    
}
