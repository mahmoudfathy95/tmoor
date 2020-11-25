<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\AreaModule\Entities\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cities = City::all();
        return view('configmodule::city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('configmodule::city.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only('ar','en','shipping_amount');
      
        City::create($data);
        Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
        return redirect('dashboard/city');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('configmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         $item= City::find($id);
        return view('configmodule::city.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $data = $request->only('ar','en','shipping_amount');
      
       
        $city->update($data);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect('dashboard/city');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        City::destroy($id);
       
        \Session::flash('success', 'تم الحذف بنجاح'); 
        return redirect()->back();
    }
}
