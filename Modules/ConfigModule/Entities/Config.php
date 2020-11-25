<?php

namespace Modules\ConfigModule\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use Translatable;
    protected $fillable = ['config_category_id','key','image'];
    public $translationModel = ConfigTranslation::class;
    public $translatedAttributes = ['name','value'];
}
