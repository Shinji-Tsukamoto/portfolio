<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    public function profile()
    {
        return $this->belongsTo('App\User');
    }
    //
}
