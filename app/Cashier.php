<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    public function sell(){
        return $this->hasMany(Sell::class,'id');
    }


}
