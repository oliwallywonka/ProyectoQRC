<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable =['brand','description'];

    public function model_shoe(){
        return $this->hasMany(Model_Shoe::class,'id');
    }

}
