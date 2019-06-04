<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =['name','ci','n_invoice'];

    public function sell(){
        return $this->hasMany(Sell::class,'id');
    }

}
