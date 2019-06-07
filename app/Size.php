<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable=['size'];

    public function shoes(){
        return $this->hasMany(Shoes::class,'id_size','id');
    }
    

}
