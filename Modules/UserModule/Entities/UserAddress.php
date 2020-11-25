<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\AreaModule\Entities\City;
use Modules\AreaModule\Entities\Zone;

class UserAddress extends Model
{
    protected $fillable = ['user_id','city_id','zone_id','street','description','long','lat','type'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
