<?php

namespace Modules\ConfigModule\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use Translatable;
    protected $fillable = [];

    public $translationModel = TextTranslation::class;
    public $translatedAttributes = ['name','details'];
}
