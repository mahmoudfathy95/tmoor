<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderStatusTranslation extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
}
