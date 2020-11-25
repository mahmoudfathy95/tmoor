<?php

namespace Modules\UserModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteAddressResource extends JsonResource
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
            'address_id'=>$this->address->id,
            'city'=>$this->address->city->name,
            'shipping_amount'=>$this->address->city->shipping_amount,
            'street'=>$this->address->street,
            'description'=>$this->address->description,
            'long'=>$this->address->long,
            'lat'=>$this->address->lat,
            'type'=>$this->address->type==1?__('usermodule::admin.home'):__('usermodule::admin.work')
        ];
    }
}
