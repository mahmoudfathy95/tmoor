<?php

namespace Modules\ProductModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\ProductModule\Transformers\ProductSimpleResource;

class OfferResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>$this->price,
            'image'=>asset('images/product/'.$this->image),
            'from'=>$this->date_from,
            'to'=>$this->date_to,
            'products'=>ProductSimpleResource::collection($this->product)
        ];
    }
}
