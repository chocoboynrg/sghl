<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{

    protected $guarded = [];

    // public function patient()
    // {
    //     return $this->hasOne('App\patient');
    // }

    // public function type_examen()
    // {
    //     return $this->hasMany('App\type_examen');
    // }

    public function type_examen()
    {
        return $this->belongsTo(Type_examen::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
     }

     public function type_examens(){
        return $this->belongsToMany(Type_examen::class);
    }

    
}
