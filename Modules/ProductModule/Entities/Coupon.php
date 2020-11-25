<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['value','type','date_from','date_to','code'];
}
