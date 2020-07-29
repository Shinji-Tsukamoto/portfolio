<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'movie_id')->withTimestamps();

    }

    public function favorite($diaryId)
    {
        $exist = $this->is_favorite($diaryId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($diaryId);
            return true;
        }
    }

    public function unfavorite($diaryId)
    {
        $exist = $this->is_favorite($diaryId);

        if($exist){
            $this->favorites()->detach($diaryId);
            return true;
        }else{
            return false;
        }
    }

    public function is_favorite($diaryId)
    {
        return $this->favorites()->where('diary_id',$diaryId)->$exists();
    }

}
