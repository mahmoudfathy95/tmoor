<?php

namespace Modules\OrderModule\Entities;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model implements ContractsTranslatable
{
    use Translatable;
    protected $fillable = ['order_status_type_id'];
    public $translatedAttributes = ['name'];

    public function orderStatusType()
    {
        return $this->belongsTo(OrderStatusType::class);
    }
}
