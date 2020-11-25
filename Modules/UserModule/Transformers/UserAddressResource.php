<?php

namespace Modules\UserModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\UserModule\Entities\FavoriteAddress;

class UserAddressResource extends JsonResource
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
            'city'=>$this->city->name,
            'shipping_amount'=>$this->city->shipping_amount,
            'street'=>$this->street,
            'description'=>$this->description,
            'long'=>$this->long,
            'lat'=>$this->lat,
            'type'=>$this->type==1?__('usermodule::admin.home'):__('usermodule::admin.work'),
            'favourite'=>FavoriteAddress::where('address_id',$this->id)->first()?__('usermodule::admin.yes'):__('usermodule::admin.no')
        ];
    }
}
