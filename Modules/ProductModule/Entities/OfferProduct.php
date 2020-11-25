<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    protected $table='offer_products';
    protected $fillable = ['offer_id','product_id'];
}
