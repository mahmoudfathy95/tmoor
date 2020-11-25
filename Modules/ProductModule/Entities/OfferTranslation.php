<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class OfferTranslation extends Model
{
    protected $fillable = ['name','description'];
    public $timestamps = false;
}
