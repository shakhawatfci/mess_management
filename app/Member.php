<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table='member';


    public function asset(){

    	$this->hasMany('App\Asset');
    }


    public function meal(){

    	$this->hasMany('App\Meal');
    }

}
