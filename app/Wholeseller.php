<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wholeseller extends Model
{
    protected $fillable =['name','ci','phone'];

    public function purchase(){
        return $this->hasMany(Purchase::class);
    }
}
