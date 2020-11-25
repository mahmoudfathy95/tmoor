<?php

namespace Modules\UserModule\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['product_id','user_id','order_id','title','message','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }
}
