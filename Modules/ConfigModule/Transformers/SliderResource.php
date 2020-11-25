<?php

namespace Modules\ConfigModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return 
        [
           "id"=>$this->id,
           "name"=>$this->name,
           "type"=>$this->cat_type==1?'category':'product',
           "parent"=>$this->cat_id,
           "image"=>asset('images/slider/'.$this->image),
        ];
    }
}
