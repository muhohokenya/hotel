<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function customer(){
        return $this->hasOne('App\customer');
    }

}
