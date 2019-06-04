<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable=["color"];

    public function shoes(){
        return $this->hasMany(Shoes::class,'id');
    }
}
