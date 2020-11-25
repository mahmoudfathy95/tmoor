<?php

namespace Modules\ProductModule\Transformers;

use Modules\ConfigModule\Entities\Config;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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

        $REVIEWS = $this->comments;
        $add_reviews=0;

        foreach($REVIEWS as $key)
        {
           $add_reviews = $add_reviews+$key->review;
        }
        $vat = Config::where('key','vat')->first();


        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>$this->price+$this->price*$vat->value/100,
            'quantity'=>$this->quantity,
            'discount'=>$discount,
            'number'=>$this->number,
            'unit'=>$this->measurementUnit->name??null,
            'image'=>asset('images/products/'.$this->image),
            'images'=>array_map(function($value) { return asset('images/products/'.$value); }, explode(',',$this->imgs)),
            'reviews'=>$add_reviews/count($REVIEWS),
            'comments'=>$this->comments

        ];
    }
}
