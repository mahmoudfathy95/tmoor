<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OrderModule\Entities\Order;
use Modules\OrderModule\Entities\OrderHistory;
use Modules\OrderModule\Entities\OrderStatus;
use Modules\OrderModule\Entities\OrderProducts;
use Modules\UserModule\Entities\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class OrderModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $orders = Order::where('order_status_type_id',1)->orderBy('id','desc')->get();
        return view('ordermodule::orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ordermodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $order = Order::find($id);
        $statuses = OrderStatus::all();
        return view('ordermodule::orders.show',compact('order','statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ordermodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Order::destroy($id);
        OrderProducts::where('order_id',$id)->delete();
        \Session::flash('success', 'تم الحذف بنجاح'); 
        return redirect()->back();
        
    }

    public function updateOrderStatus(Request $request)
    {
        $request->validate([
            'order_id'=>'required|numeric',
            'order_status_id'=>'required|numeric',
        ]);

        $data = $request->only('order_id','order_status_id','comment');
        $order = Order::find($request->order_id);
        if($order->order_status_id != $request->order_status_id){
            $status = OrderStatus::find($request->order_status_id);
            $order->order_status_type_id = $status->order_status_type_id;
            $order->order_status_id = $status->id;
            $order->update();
            OrderHistory::create($data);
            Notification::create([
                'user_id'=>$order->user_id,
                'order_id'=>$order->id,
                'title'=>__('productmodule::category.your_order').$order->id,
                'message'=>$order->orderstatus->name
            ]);
            $this->notification($order->user->firebase_token,$order->orderstatus->name,__('productmodule::category.your_order').$order->id);
        }

        

        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect()->route('orders.show',$request->order_id);
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

    public function print($id)
    {
        $order = Order::find($id);

        return view('ordermodule::orders.print',compact('order'));
    }

}
