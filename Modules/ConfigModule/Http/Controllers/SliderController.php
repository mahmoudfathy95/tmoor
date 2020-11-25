<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Slider;
use Modules\ProductModule\Entities\Category;
use Modules\CommonModule\Helper\UploaderHelper;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\Discount;

class SliderController extends Controller
{
    use UploaderHelper;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $sliders = Slider::where('type',1)->get(); 
        return view('configmodule::slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('configmodule::slider.create',compact('categories','products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only('ar','en','type');
        $data['image'] = $this->upload($request->img, 'slider');
        
        if($request->type == 1)
        {
            $data['cat_type']=1;
            $data['cat_id']=$request->category;
        }else{
            $data['cat_type']=2;
            $data['cat_id']=$request->product;
        }
       $data['type']=1;
        Slider::create($data);
        Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
        return redirect('dashboard/slider');
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
        $categories = Category::all();
        $products = Product::all();
        $item = Slider::find($id);
        return view('configmodule::slider.edit',compact('categories','products','item'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $data = $request->only('ar','en','type');
        if($request->img)
            $data['image'] = $this->upload($request->img, 'slider');
        
        if($request->type == 1)
        {
            $data['cat_type']=1;
            $data['cat_id']=$request->category;
        }else{
            $data['cat_type']=2;
            $data['cat_id']=$request->product;
        }
       
        $slider->update($data);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect('dashboard/slider');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Slider::destroy($id);
       
        \Session::flash('success', 'تم الحذف بنجاح'); 
        return redirect()->back();
    }
}
