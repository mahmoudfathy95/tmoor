<?php

namespace Modules\UserModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name'=>$this->first_name??null,
            'last_name'=>$this->last_name??null,
            'email'=>$this->email??null,
            'phone'=>$this->phone,
            'city'=>$this->city?$this->city->name:null,
        ];
    }
}
