<?php

namespace Modules\AreaModule\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use Translatable;
    protected $fillable = ['city_id'];
    public $translationModel = ZoneTranslation::class;
    public $translatedAttributes = ['name'];
}
