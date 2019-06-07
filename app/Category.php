<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['description'];

    public function model_shoe(){
        return $this->hasMany(Model_shoe::class,'id_category');
    }
}
