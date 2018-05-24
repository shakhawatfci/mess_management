<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
   protected $table='meal';

   
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
