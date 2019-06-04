<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function purchase(){
        return $this->hasMany(Purchase::class,'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id');
    }
}
