<?php
namespace Modules\ProductModule\Repository;

use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\Discount;
use Modules\UserModule\Entities\Notification;

class ProductRepository
{
    public function find($id)
    {
        return Product::find($id);
    }

    public function recentlyAdded()
    {
        return Product::orderByDesc('id')->take(6)->get();
    }

    public function mostPaid()
    {
        if(Product::count() > 6)
           return Product::get()->random(6);
        else
            return Product::get();
    }


    public function create($data_product,$data_discount)
    {
        try{
            
            $product = Product::create($data_product);
            
            $data_discount['product_id'] =$product->id; 
            
            Discount::create($data_discount);
            return true;
        }catch(Exception $e)
        {
           return false;
        }   
         
    }


    public function update($id,$data_product,$data_discount)
    {
        try{
            $product = Product::find($id);
            $productQty = $product->quantity;
            $product->update($data_product);
            
            Discount::where('product_id',$id)->delete();
            $data_discount['product_id'] =$id; 
            
            Discount::create($data_discount);

            if($productQty == 0 && $product->quantity>0){
                $notified = Notification::where('product_id',$product->id)->with('user')->get();
                // if($notified && $notified->count() > 0){
                    foreach($notified as $item){
                        if($item->user)
                        {
                           $this->notification($item->user->firebase_token,__('productmodule::category.exist_body'),$product->name); 
                        }
                       
                        $item->update(['status'=>1]);
                    // }
                }
            }
            return true;
        }catch(\Exception $e)
        {
           return false;
        }   
         
    }
    
    public function notification($firebase,$body,$title)
    {
       $authToken = 'key=AAAAkCvIsp8:APA91bFQ2D6DEKewieU7gnxUwxn5qSgEakO8DoearpAdOfgI_-vtkTFOypO4dGeoEB6HGwsJQITHRDrcypOA2jDOepX1-H-n8dyF7TtYzNixonHovwUZntMw3IQJ2kb22X1tfJKYegyE';
       
        // The data to send to the API
        $postData = array(
            'priority' => 'HIGH',
            'to' => $firebase,
            'notification' =>array('body' =>$body ,'title'=>$title ),
            'data' =>array('body' =>$body ,'title'=>$title )
        );

        // Setup cURL
        $ch = curl_init('https://fcm.googleapis.com/fcm/send');
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$authToken,
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);
        
        // Check for errors
        if($response === FALSE){
            die(curl_error($ch));
        }else
        {
            return $response;
        }
    }

    public function filter($request)
    {
        $query = Product::query();

        if(isset($request['name']))
        {
            $query->whereTranslationLike('name','%' . $request['name'] . '%');
        }

        if(isset($request['details']))
        {
            $query->whereTranslationLike('description','%' . $request['details'] . '%');
        }


        if(isset($request['price_from']))
        {
          $query->where('price','>=',$request['price_from']);
        }

        if(isset($request['price_to']))
        {
          $query->where('price','<=',$request['price_to']);
        }

        $products = $query->get();

        return $products;
    }
}
