<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts(){
        //                           post table/intermediate table
        return $this->hasManyThrough('App\Post','App\User');
    }
}
