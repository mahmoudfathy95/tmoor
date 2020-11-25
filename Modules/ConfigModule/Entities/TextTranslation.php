<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class TextTranslation extends Model
{
    protected $fillable = ['name','details'];
    public $timestamps = false;
}
