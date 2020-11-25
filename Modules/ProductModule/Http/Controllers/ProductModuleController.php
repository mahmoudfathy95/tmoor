<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\Measurement;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ProductModule\Entities\Discount;
use RealRashid\SweetAlert\Facades\Alert;

class ProductModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use UploaderHelper;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = Product::all();
        
        return view('productmodule::products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $measurements=Measurement::all();
        $categories=Category::all();
        return view('productmodule::products.create',compact('categories','measurements'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $data = $request->only('ar','en','price','quantity','category_id','measurement_id','number');
       
      
       $data_discount = $request->only('value','type');
       
       if($request->type==1)
       {
           if($request->price < $request->value )
           {
               \Session::flash('error', 'قيمة الخصم اكبر من سعر المنتج'); 
               return redirect()->back();
           }
           
       }else
       {
        if($request->price < ($request->value*$request->price)/100 )
           {
               \Session::flash('error', 'قيمة الخصم اكبر من سعر المنتج'); 
               return redirect()->back();
           }   
       }
       $data['image'] = $this->upload($request->img, 'products');
       if($request->imgs)
        {
          $data['imgs']=implode(',',$this->uploadAlbum($request->imgs,'products'));
        }
       
       $this->productRepository->create($data,$data_discount);
       Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
       return redirect('dashboard/products');
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
        $item = Product::find($id);
        $measurements=Measurement::all();
        $categories=Category::all();
        return view('productmodule::products.edit',compact('item','categories','measurements'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
         if($request->type==1)
       {
           if($request->price < $request->value )
           {
               \Session::flash('error', 'قيمة الخصم اكبر من سعر المنتج'); 
               return redirect()->back();
           }
           
       }else
       {
        if($request->price < ($request->value*$request->price)/100 )
           {
               \Session::flash('error', 'قيمة الخصم اكبر من سعر المنتج'); 
               return redirect()->back();
           }   
       }
       
        $data = $request->only('ar','en','price','quantity','category_id','measurement_id','number');
        $data_discount = $request->only('value','type');
        if($request->img)
        {
          $data['image'] = $this->upload($request->img, 'products');  
        }

        if($request->imgs)
        {
            $data['imgs']=implode(',',$this->uploadAlbum($request->imgs,'products')); 
        }
        
       
        
        $this->productRepository->update($id,$data,$data_discount);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect('dashboard/products');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
       
        Discount::where('product_id','id')->delete();
        

        \Session::flash('success', 'تم الحذف بنجاح'); 
        return redirect()->back();
    }
}
