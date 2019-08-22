<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    public function contact(){
        return $this->belongTo('App\Contact');
    }
    public function status(){
        return $this->belongTo('App\Status');
    }
    public function user(){
        return $this->belongTo('App\User');
    }
}
