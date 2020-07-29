<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');
    //
    const PUBLISHED = 1;
    const DRAFT = 2;

    public function getStatusLabelAttribute ()
    {
        $status = [
            '1'=>'公開',
            '2'=>'下書き'
        ];
        return $status[$this->status];
    }

    public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','movie_id','user_id')->withTimestamps();
    }
}       