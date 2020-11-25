<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ConfigCategory extends Model
{
    protected $fillable = ['name'];
    public $translationModel = ConfigTranslation::class;
    public $translatedAttributes = ['name','value'];
}
