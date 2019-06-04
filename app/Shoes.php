<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{

    public function model_shoes(){
        return $this->belongsTo(Model_shoes::class,'id');
    }

    public function size(){
        return $this->belongsTo(Size::class,'id');

    }

    public function color(){
        return $this->belongsTo(Color::class,'id');
    }

    public function sell_detail(){
        return $this->hasMany(Sell_detail::class,'id');
    }

    public function purchase_detail(){
        return $this->hasMany(Purchase_detail::class,'id');
    }

}
