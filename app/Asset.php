<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table='asset';


   public function member()
    {
        return $this->belongsTo('App\Member','member_id');
    }
    
}
