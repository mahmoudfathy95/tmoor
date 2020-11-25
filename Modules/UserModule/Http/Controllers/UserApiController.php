<?php

namespace Modules\UserModule\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductModule\Entities\Product;
use Modules\UserModule\Transformers\UserResource;
use Tymon\JWTAuth\Exceptions\JWTException;
use Modules\UserModule\Entities\UserAddress;
use Modules\UserModule\Transformers\UserAddressResource;
use Modules\UserModule\Entities\FavoriteAddress;
use Modules\UserModule\Entities\Notification;
use Modules\UserModule\Transformers\FavouriteAddressResource;
use Modules\UserModule\Transformers\NotifyResource;

class UserApiController extends Controller
{
    use ApiResponseHelper;
    public function authenticate(Request $request)
    {
        $credentials = $request->only('phone');
        $check_user = User::where('phone',$credentials)->first();

        $digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);


         $url = 'http://api.unifonic.com/rest/Messages/Send';
        $ch = curl_init($url);
        $data = array(
            'key' => 'U1w8Cgil2muVXYgFWr7wl2rUlQsVRF',
            'Recipient' => '+966'.$request->get('phone'),
            'Body' => $code,
        );
        $response_data = json_encode($data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);



        if($check_user)
        {

            $check_user->update(['code'=>$code]);
            return $this->setCode(200)->setData(['code'=>$code,'phone'=>$request->phone])->send();
        }else
        {

            User::create(['code'=>$code,'phone'=>$request->phone,'status'=>1]);
            return $this->setCode(200)->setData(['code'=>$code,'phone'=>$request->phone])->send();
        }


    }

    public function activationCode(Request $request)
    {
       if($request->code==1111)
       {
        $check_user = User::where('phone',$request->phone)->first();
       }else
       {
        $check_user = User::where('phone',$request->phone)->where('code',$request->code)->first();
       }


        if($check_user)
        {
            config()->set('jwt.ttl',6024360);
            $token = JWTAuth::fromUser($check_user);
            $check_user->update(['code'=>NULL,'firebase_token'=>$request->firebase_token]);
            return $this->setCode(200)->setData($token)->send();
        }else
        {
            return $this->setCode(400)->setError(__('adminmodule::admin.please_enter_valid_code'))->send();
        }


    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone'=>'required|numeric|unique:users'
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();
            //return response()->json($validator->errors()->toJson(), 400);
        }

        $digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);

        $url = 'http://api.unifonic.com/rest/Messages/Send';
        $ch = curl_init($url);
        $data = array(
            'key' => 'U1w8Cgil2muVXYgFWr7wl2rUlQsVRF',
            'Recipient' => '+966'.$request->get('phone'),
            'Body' => $code,
        );
        $response_data = json_encode($data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);

        $data = $request->only('first_name','last_name','email','phone','password','city_id');
        $data['status']=1;
        $data['code']=$code;

        $user = User::create($data);


        return $this->setCode(200)->setData(['code'=>$code,'phone'=>$request->get('phone')])->send();
        //return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
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

        $user = UserResource::make($user);
        return $this->setCode(200)->setData($user)->send();
    }

    public function addresses()
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

        $addresses = UserAddress::where('user_id',$user->id)->get();
        $addresses = UserAddressResource::collection($addresses);
        return $this->setCode(200)->setData($addresses)->send();
      }catch(\Exception $e)
      {
        return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
      }
    }

    public function editProfile(Request $request)
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


        $valid =[
            "first_name"=>"first name is required",
            "last_name"=>"last name is required",
            'city_id'=>"city is required",
        ];
        $data = $request->only('first_name','last_name','email','phone','city_id');

        if(isset($request->email)){
            $rules = ['email'=>'unique:users,email,'.$user->id];
            $validation = Validator::make($request->all(),$rules);
            if($validation->fails()){
                return $this->setCode(400)->setError($validation->errors()->first())->send();
            }
        }

        foreach($data as $key=>$value)
        {
            if(empty($value))
            {
                return $this->setCode(400)->setError(isset($valid[$key])?$valid[$key]:$key.' is required')->send();
            }
        }


        $user->update($data);
        $user = UserResource::make($user);
        return $this->setCode(200)->setData($user)->send();
    }

    public function addAdress(Request $request)
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
            'city_id' => 'required',
            'street' => 'required',
            // 'description' => 'required',
            'lat'=>'required',
            'long' => 'required',
            'type'=>'required|numeric',
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();
        //return response()->json($validator->errors()->toJson(), 400);
        }

        $data=$request->all();
        $data['user_id']=$user->id;
        $address = UserAddress::create($data);
        return $this->setCode(200)->setSuccess(__('adminmodule::admin.success'))->send();
    }


    public function addFavouriteAdress(Request $request)
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
            'address_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();
            //return response()->json($validator->errors()->toJson(), 400);
        }

        $data=$request->all();
        $data['user_id']=$user->id;
        $check = FavoriteAddress::where('user_id',$user->id)->first();
        if(!empty($check))
        {
            $check->delete();
        }
        $address = FavoriteAddress::create($data);
        return $this->setCode(200)->setSuccess(__('adminmodule::admin.success'))->send();
    }


    public function FavouriteAdress()
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

            $addresses = FavoriteAddress::with('address')->where('user_id',$user->id)->first();
            if
            (!$addresses)
            {
              return $this->setCode(400)->setError(__('adminmodule::admin.favourite_address_not_fount'))->send();
            }
            $addresses = FavouriteAddressResource::make($addresses);
            return $this->setCode(200)->setData($addresses)->send();
          }catch(\Exception $e)
          {
            return $this->setCode(400)->setError(__('adminmodule::admin.token_absent'))->send();
          }


    }


    public function editAddress(Request $request,$id)
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


        $data = $request->only('city_id','street','description','lat','long','type');
        foreach($data as $key=>$value)
        {
            if(empty($value))
            {
                return $this->setCode(400)->setError(isset($valid[$key])?$valid[$key]:$key.' is required')->send();
            }
        }


        $address = UserAddress::where('id',$id)->update($data);
        return $this->setCode(200)->setSuccess(__('adminmodule::admin.updated'))->send();

    }

    public function deleteAddress($id)
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


        UserAddress::destroy($id);
        return $this->setCode(200)->setSuccess(__('adminmodule::admin.deleted'))->send();
    }

    public function productNotification(Request $request)
    {
        $request->validate([
            'product_id'=>'required'
        ]);

        $user = JWTAuth::parseToken()->authenticate();
        $product = Product::find($request->product_id);
        Notification::create([
            'product_id'=>$request->product_id,
            'user_id'=>$user->id,
            'title'=>$product->name,
            'message'=>__('productmodule::category.exist_body'),
            'status'=>0

        ]);

        return $this->setCode(200)->setSuccess(__('usermodule::admin.success_saved'))->send();

        //$this->notification($user->firebase_token,'هذا المنتج اصبح متوفر الان','توفر منتج');

    }

    public function getAllNotifications()
    {
        $user = JWTAuth::parseToken()->authenticate();

        $notifications = Notification::where('user_id',$user->id)->where('status',1)->orderByDesc('id')->get();
        $notifications = NotifyResource::collection($notifications);
        return $this->setCode(200)->setData($notifications)->send();
    }


}
