<?php

namespace Modules\OrderModule\Transformers;

use Modules\OrderModule\Transformers\OrderProductsApiResource;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleOrderApiResource extends JsonResource
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
            "user"=>$this->user->first_name,
            "city"=>$this->address->city->name??null,
            "street"=>$this->address->street??null,
            "description"=>$this->address->description??null,
            "long"=>$this->address->long??null,
            "lat"=>$this->address->lat??null,
            "addressType"=>($this->address)?$this->address->type==1?'home':'work':null,
            "payment"=>$this->payment,
            "orderStatus_type"=>$this->orderstatusType->name,
            'orderStatus'=>$this->orderHistory[count($this->orderHistory)-1]->singlestatus->name,
            "date"=>$this->created_at->format('Y-m-d'),
            "shipping"=>$this->shipping,
            'products'=>OrderProductsApiResource::collection($this->orderProduct)
        ];
    }
}
