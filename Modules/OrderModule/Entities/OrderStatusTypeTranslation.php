<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderStatusTypeTranslation extends Model
{
    protected $fillable = ['name'];
    public $timestampes = false;
}
