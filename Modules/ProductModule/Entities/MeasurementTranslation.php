<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class MeasurementTranslation extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
}
