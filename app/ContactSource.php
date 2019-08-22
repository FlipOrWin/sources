<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactSource extends Model
{
    //
    public function contacts(){
        $this->hasMany('App\Contact');
    }
}
