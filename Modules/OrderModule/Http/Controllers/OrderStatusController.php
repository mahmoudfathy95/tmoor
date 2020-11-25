<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OrderModule\Entities\OrderStatus;
use Modules\OrderModule\Entities\OrderStatusType;
use RealRashid\SweetAlert\Facades\Alert;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $order_statuses = OrderStatus::with('orderStatusType')->get();
        return view('ordermodule::order_status.index',compact('order_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $types = OrderStatusType::all();
        return view('ordermodule::order_status.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'order_status_type_id'=>'required|numeric',
            'ar.name'=>'required|string',
            'en.name'=>'required|string',
        ]);

            OrderStatus::create($data);
            Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
        return redirect()->route('order_status.index');
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ordermodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $status = OrderStatus::find($id);
        $types = OrderStatusType::all();
        return view('ordermodule::order_status.edit',compact('status','types'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'order_status_type_id'=>'required|numeric',
            'ar.name'=>'required|string',
            'en.name'=>'required|string',
        ]);


        $status = OrderStatus::find($id);
        $status->update($data);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect()->route('order_status.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        OrderStatus::where('id',$id)->delete();
        return redirect()->route('order_status.index');
    }
}
