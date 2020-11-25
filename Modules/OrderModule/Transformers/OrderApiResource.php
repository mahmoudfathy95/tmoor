<?php

namespace Modules\OrderModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "subTotal"=>$this->subTotal,
            "discountCoupon"=>$this->discount,
            "total"=>$this->total,
            "user"=>$this->user->first_name??null,
            "city"=>$this->address->city->name??null,
            "street"=>$this->address->street??null,
            "description"=>$this->address->description??null,
            "long"=>$this->address->long??null,
            "lat"=>$this->address->lat??null,
            "orderStatus_type"=>$this->orderstatusType->name,
            'orderStatus'=>$this->orderHistory[count($this->orderHistory)-1]->singlestatus->name,
            "addressType"=>$this->address?($this->address->type==1?'home':'work'):null,
            "payment"=>$this->payment,
            'order_date'=>date('Y-m-d H:i:s',strtotime($this->created_at))
        ];
    }
}
