<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell_detail extends Model
{
    public function sell(){
        return $this->belongsTo(Sell::class,'id');
    }

    public function shoes(){
        return $this->belongsTo(Shoes::class,'id');
    }
}
