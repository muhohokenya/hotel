<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    /*
     * The first argument passed to the hasOne method is the name of the related model
     * */

    public function room(){
        return $this->hasOne('App\Room');
    }
}
