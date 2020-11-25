<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ProductModule\Entities\Product;

class OrderProducts extends Model
{
    protected $fillable = ['product_id','order_id','quantity','price','discount'];
    protected $table = 'orderproducts';


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
