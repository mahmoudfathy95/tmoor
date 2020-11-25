<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','name','review','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
