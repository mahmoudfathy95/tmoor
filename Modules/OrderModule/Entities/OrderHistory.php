<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $fillable = ['order_id','order_status_id','comment'];

    public function status()
    {
        return $this->belongsTo(OrderStatus::class,'order_status_id');
    }
    
    public function singlestatus()
    {
        return $this->belongsTo(OrderStatus::class,'order_status_id');
    }
}
