<?php

namespace Modules\UserModule\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class NotifyResource extends JsonResource
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
            'id'=>($this->product_id != null)?$this->product_id:$this->order_id,
            'type'=>($this->product_id != null)?0:1,
            'title'=>$this->title,
            'message'=>$this->message,
            'date'=>$this->created_at->diffForHumans()
        ];
    }
}
