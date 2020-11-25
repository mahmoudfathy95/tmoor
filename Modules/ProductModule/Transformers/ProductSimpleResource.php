<?php

namespace Modules\ProductModule\Transformers;

use Modules\ConfigModule\Entities\Config;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSimpleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        if(isset($this->discount))
        {
            if($this->discount->type == 1)
            {
                $discount = $this->discount->value;
            }else
            {
               $discount = ($this->discount->value * $this->price)/100; 
            }
            
        }else
        {
            $discount = 0;
        }

        $vat = Config::where('key','vat')->first();

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price+$this->price*$vat->value/100,
            'quantity'=>$this->quantity,
            'number'=>$this->number,
            'unit'=>$this->measurementUnit->name??null,
            'discount'=>$discount,
            'image'=>asset('images/products/'.$this->image)
        ];
    }
}
