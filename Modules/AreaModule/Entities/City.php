<?php

namespace Modules\AreaModule\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;
    protected $fillable = ['shipping_amount'];
    public $translationModel = CityTranslation::class;
    public $translatedAttributes = ['name'];
}
