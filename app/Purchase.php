<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    public function purchase_detail(){
        return $this->hasMany(Purchase_detail::class,'id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'id');
    }

    public function wholeseller(){
        return $this->belongsTo(Wholeseller::class,'id');
    }

}
