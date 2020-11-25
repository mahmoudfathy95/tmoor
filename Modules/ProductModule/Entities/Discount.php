<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['value','type','product_id'];

    public function product()
    {
        return $this->belongsTo(product::class,'product_id');
    }
}
