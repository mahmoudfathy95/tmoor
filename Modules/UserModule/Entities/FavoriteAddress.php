<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;

class FavoriteAddress extends Model
{
    protected $fillable = ['user_id','address_id'];

    public function address()
    {
        return $this->belongsTo(UserAddress::class,'address_id');
    }
}
