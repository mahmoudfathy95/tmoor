<?php

namespace Modules\ProductModule\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use Translatable;
    protected $fillable = [];
    public $translationModel = MeasurementTranslation::class;
    public $translatedAttributes = ['name'];
}
