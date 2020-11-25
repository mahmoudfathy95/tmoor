<?php

namespace Modules\OrderModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductsApiResource extends JsonResource
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
            "quantity"=>$this->quantity,
            "price"=>$this->price,
            "discount"=>$this->discount,
            "product_id"=>$this->product_id,
            "product"=>$this->product->name,
            "vat"=>$this->vat,
            "image"=>asset('images/products/'.$this->product->image)
        ];
    }
}
