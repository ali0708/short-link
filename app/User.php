<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    const TYPE_ADMIN = 'admin';
    const TYPE_MANAGER = 'manager';
    const TYPE_USER = 'user';

    const TYPE = [
        self::TYPE_ADMIN,self::TYPE_MANAGER,self::TYPE_USER
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type'
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

    public function link()
    {
        return $this->hasMany(Link::class,'user_id','id');
    }

    public static function isAdmin(){
        $id = auth()->id();
        $user = User::findOrFail($id);
        if ($user->type == 'admin'){
            return 1;
        }
    }

    public static function isManager(){
        $id = auth()->id();
        $user = User::findOrFail($id);
        if ($user->type == 'manager'){
            return 1;
        }
    }

    public static function isUser(){
        $id = auth()->id();
        $user = User::findOrFail($id);
        if ($user->type == 'user'){
            return 1;
        }
    }

}
