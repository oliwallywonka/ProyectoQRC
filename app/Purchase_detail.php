<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_detail extends Model
{
    public function purchase(){
        return $this->belongsTo(Purchase::class,'id');
    }

    public function shoes(){
        return $this->belongsTo(Shoes::class,'id');
    }
}
