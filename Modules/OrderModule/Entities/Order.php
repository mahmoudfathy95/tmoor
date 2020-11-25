<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\UserModule\Entities\UserAddress;
use App\User;

class Order extends Model
{
    protected $fillable = ['shipping','subTotal','discount','total','address_id','payment','user_id','coupon','city','street','street_description'];

    public function orderProduct()
    {
        return $this->hasMany(OrderProducts::class,'order_id');
    } 

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    } 

    public function address()
    {
        return $this->belongsTo(UserAddress::class,'address_id');
    } 

    public function orderHistory()
    {
        return $this->hasMany(OrderHistory::class);
    }
    
    public function orderstatusType()
    {
        return $this->belongsTo(OrderStatusType::class,'order_status_type_id');
    }
    
     public function orderstatus()
    {
        return $this->belongsTo(OrderStatus::class,'order_status_id');
    }
}
