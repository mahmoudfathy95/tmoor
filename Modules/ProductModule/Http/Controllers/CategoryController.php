<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\Category;
use Modules\CommonModule\Helper\UploaderHelper;

use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\Discount;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use UploaderHelper;
    public function index()
    {
        $categories = Category::all();
        return view('productmodule::category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('productmodule::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $data = $request->only('ar','en');
       $data['image'] = $this->upload($request->img, 'category');
       Category::create($data);
       Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
       return redirect('dashboard/category');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('productmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $item = Category::find($id);
        return view('productmodule::category.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $item = Category::find($id);
        $data = $request->only('ar','en');
        if($request->file('img'))
        {
            $data['image'] = $this->upload($request->img, 'category');
        }
       
        $item->update($data);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect('dashboard/category');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        $products = Product::where('category_id',$id)->get();
        Product::where('category_id',$id)->delete();
        foreach($products as $key)
        {
            Discount::where('product_id','id')->delete();
        }

        \Session::flash('success', 'تم الحذف بنجاح'); 
        return redirect()->back();
    }
}
