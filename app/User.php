<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\UserModule\Entities\UserAddress;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Modules\AreaModule\Entities\City;

use Modules\UserModule\Entities\FavoriteAddress;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone','status','code','city_id','firebase_token'
    ];

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function favouriteAddress()
    {
        return $this->belongsToMany(FavoriteAddress::class, 'favorite_addresses','user_id','address_id');
    }

}
