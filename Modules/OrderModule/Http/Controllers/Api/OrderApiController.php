<?php

namespace Modules\OrderModule\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Routing\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Validator;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\Discount;
use Modules\ProductModule\Entities\Coupon;
use Modules\OrderModule\Entities\Order;
use Modules\OrderModule\Entities\OrderHistory;
use Modules\OrderModule\Entities\OrderProducts;
use Modules\OrderModule\Transformers\OrderApiResource;
use Modules\OrderModule\Transformers\SingleOrderApiResource;
use Modules\UserModule\Entities\UserAddress;
use Modules\ConfigModule\Entities\Config;
use Modules\AreaModule\Entities\City;

class OrderApiController extends Controller
{
    use ApiResponseHelper;
    public function checkout(Request $request)
    {

        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return $this->setCode(400)->setError(__('adminmodule::admin.user_not_found'))->send();
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return $this->setCode(400)->setError(__('adminmodule::admin.token_expired'))->send();

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return $this->setCode(400)->setError(__('adminmodule::admin.token_invalid'))->send();

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return $this->setCode(400)->setError(__('adminmodule::admin.token_absent'))->send();

        }

        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'payment' => 'required',
            'data'=>'required'
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();
    //            return response()->json($validator->errors()->toJson(), 400);
        }

        $address = UserAddress::find($request->address);

        $payment = $request->payment;

        $dt = date('Y-m-d');

        $products =[];
        $all_prducts=[];
        $sub_total=0;
        foreach($request->data as $key)
        {
            $product = Product::where('id',$key['product_id'])->first();
            if(!empty($product))
            {
                $products['product_id'] = $key['product_id'];
                $products['quantity'] = $key['quantity'];
                $products['price'] = $product->price;


                if($product->quantity < $key['quantity'])
                {
                    return $this->setCode(400)->setError(__('adminmodule::admin.valid_quantity'))->send();
                }

                if($product->discount)
                {
                  if($product->discount->type==1)
                  {
                      $products['discount'] = $product->discount->value;
                  }else
                  {
                    $products['discount'] = ($product->discount->value*$product->price)/100;
                  }
                }else
                {
                    $products['discount'] = 0;
                }

                $vat = ($product->price *$key['quantity'] * Config::where('key','vat')->first()->value)/100;

                $products['vat'] = $vat;

                $sub_total += (($product->price*$key['quantity'])+$vat)-($products['discount']*$key['quantity']);




                array_push($all_prducts,$products);
            }else
            {
                return $this->setCode(400)->setError(__('adminmodule::admin.products_not_avilable'))->send();

            }

        }


        if(isset($request->coupon))
        {
            $coupon = $request->coupon;
            $check_coupon = Coupon::where('code',$coupon)->where('date_from','<=',$dt)->where('date_to','>=',$dt)->first();
                if(!empty($check_coupon))
                {
                   if($check_coupon->type == 'value')
                   {
                       $coupon_discount = $check_coupon->value;
                       $total = $sub_total - $check_coupon->value;
                   }else
                   {
                    $coupon_discount = ($check_coupon->value*$sub_total)/100;
                    $total = $sub_total - ($check_coupon->value*$sub_total)/100 ;
                   }
                }else{
                    $total = $sub_total;
                    $coupon_discount = 0;
                }
        }else
        {
            $total = $sub_total;
            $coupon = NULL;
            $coupon_discount = 0;

        }

            $shipping = City::where('id',$address->city->id)->first()->shipping_amount;
            $total = $total + $shipping;

        $order = Order::create([
            "user_id"=>$user->id,
            "subTotal"=>$sub_total,
            "discount"=>$coupon_discount,
            "coupon"=>$coupon,
            "total"=>$total,
            "address_id"=>$address->id,
            'city'=>$address->city->name,
            'street'=>$address->street,
            'street_description'=>$address->description,
            "payment"=>$payment,
            "shipping"=>$shipping
        ]);

        foreach($all_prducts as $key)
        {
            $product_update = Product::find($key['product_id']);
            $product_update->update(['quantity'=>$product_update->quantity-$key['quantity']]);
            $key['order_id']=$order->id;
            OrderProducts::create($key);
        }

        OrderHistory::create(['order_id'=>$order->id, 'order_status_id'=>1,'comment'=>'جديد']);

        return $this->setCode(200)->setSuccess(__('adminmodule::admin.success'))->send();

    }

    public function orders()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return $this->setCode(400)->setError(__('adminmodule::admin.user_not_found'))->send();
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return $this->setCode(400)->setError(__('adminmodule::admin.token_expired'))->send();

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return $this->setCode(400)->setError(__('adminmodule::admin.token_invalid'))->send();

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return $this->setCode(400)->setError(__('adminmodule::admin.token_absent'))->send();

        }


        try{

            $orders = Order::where('user_id',$user->id)->get();
            $orders = OrderApiResource::collection($orders);
            return $this->setCode(200)->setData($orders)->send();
          }catch(\Exception $e)
          {
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
          }
    }


    public function singleOrder($id)
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return $this->setCode(400)->setError(__('adminmodule::admin.user_not_found'))->send();
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return $this->setCode(400)->setError(__('adminmodule::admin.token_expired'))->send();

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return $this->setCode(400)->setError(__('adminmodule::admin.token_invalid'))->send();

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return $this->setCode(400)->setError(__('adminmodule::admin.token_absent'))->send();

        }


        try{

            $orders = Order::where('id',$id)->first();

            $orders = SingleOrderApiResource::make($orders);
            return $this->setCode(200)->setData($orders)->send();
          }catch(\Exception $e)
          {
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
          }
    }
}
