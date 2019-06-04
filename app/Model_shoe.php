<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_shoe extends Model
{

    protected $fillable=["model","qr_code","ref_price","photo","id_brand","id_category"];

    public function shoes(){
        return $this->hasMany(Shoes::class,'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'id');
    }

}
