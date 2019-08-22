<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactStatus extends Model
{
    //
    public function contacts(){
        $this->hasMany('App\Contact');
    }
}
