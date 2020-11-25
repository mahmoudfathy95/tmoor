<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ConfigTranslation extends Model
{
    protected $fillable = ['name','value'];
    public $timestamps = false;
}
