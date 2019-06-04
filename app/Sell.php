<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    public function cashier(){
        return $this->belongsTo(Cashier::class,'id');
    }

    public function seller(){
        return $this->belongsTo(Seller::class,'id');
    }

    public function client(){
        return $this->belongsTo(Client::class,'id');
    }

    public function sell_detail(){
        return $this->hasMany(Sell_detail::class,'id');
    }
}
