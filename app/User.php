<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
    public function posts()
    {
      return $this->hasMany('App\posts', 'author_id');
    }
    public function isFollowing(User $user)
    {
        return (bool) $this->following->where('id', $user->id)->count();
    }
    public function isNotSame(User $user)
    {
        return $this->id !== $user->id;
    }
    public function canUnfollow(User $user)
    {
        return $this->isFollowing($user);
    }
    public function canFollow(User $user)
    {
        if (!$this->isNotSame($user)) {
            return false;
        }
        return !($this->isFollowing($user));
    }
    public function following()
    {
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'follower_id');
    }
    public function likes()
    {
        return $this->belongsToMany('App\User', 'Like', 'user_id');
    }
    public function Suggesions()
    {

        $foll = $this->following()->pluck('users.id')->map(function ($item, $key) {
          return User::find($item)->following()->pluck('users.id');
        });
        $users = User::find($foll->collapse()->diff($this->following()->pluck('users.id')))->diff([$this]);  
        return $users;
    }
}
