<?php

namespace Modules\OrderModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Config;
use Modules\ProductModule\Entities\Product;
use Illuminate\Contracts\Support\Renderable;
use Modules\ProductModule\Entities\Discount;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\OrderModule\Transformers\CartResource;
use Modules\ProductModule\Transformers\ProductResource;

class CartController extends Controller
{
  use ApiResponseHelper;
    public function checkCart(Request $request)
    {
        $cart=[];
        $vat = Config::where('key','vat')->first()->value;
        $total_vat=0;
        $total = 0;
        $free_shipping = Config::where('key','free_shipping')->first()->value;
        foreach($request->all()['data'] as $key)
        {
           $product = Product::with('discount')->find($key['product_id']);
           if(!empty($product))
           {
            if(isset($product->discount))
            {
                if($product->discount->type == 1)
                {
                    $discount = $product->discount->value;
                    $total_vat += $product->price * $vat * $key['quantity'] / 100;
                    $total += ($product->price- $discount) * $key['quantity'];
                }else
                {
                   $discount = ($product->discount->value * $product->price)/100; 
                   $total_vat += $product->price * $vat * $key['quantity'] / 100;
                   $total += ($product->price- $discount) * $key['quantity'];
                }
                
            }else
            {
              $total_vat += $product->price * $vat * $key['quantity'] / 100;
              $total += $product->price * $key['quantity'];
            }
             
              if($product->quantity>=$key['quantity'])
              {
                $product['avaliable']='avliable';
                
              }else
              {
                $product['avaliable']='non avliable';
              }
              $product['sendquantity']=$key['quantity'];
              array_push($cart,CartResource::make($product));
           }
        }

        $data=['cart'=>$cart, 'total'=>$total, 'total_vat'=>$total_vat, 'free_shipping'=>$free_shipping];

        return $this->setCode(200)->setData($data)->send();
    }
}
