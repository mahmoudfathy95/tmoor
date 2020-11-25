<?php

namespace Modules\OrderModule\Entities;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class OrderStatusType extends Model implements ContractsTranslatable
{
    use Translatable;
    protected $fillable = [];
    public $translatedAttributes = ['name'];
}
