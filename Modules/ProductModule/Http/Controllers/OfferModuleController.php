<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\Offer;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\OfferProduct;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\CommonModule\Helper\UploaderHelper;

class OfferModuleController extends Controller
{
    use UploaderHelper;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $offers = Offer::all();
        return view('productmodule::offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $products = Product::all();
        return view('productmodule::offers.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $data = $request->only('ar','en','price','date_from','date_to');
       $data_products = $request->only('products');
       $data['image'] = $this->upload($request->img, 'offer');
       
       $offer=Offer::create($data);
     
       foreach($data_products['products'] as $key)
       {
       
        OfferProduct::create(['offer_id'=>$offer->id,'product_id'=>$key]);
       }
       Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
       return redirect('dashboard/offers');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('productmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $ofpro = OfferProduct::select('product_id')->where('offer_id',$id)->get();
        $arr=[];
        foreach($ofpro as $key)
        {
            array_push($arr,(int)$key->product_id);
        }
        $products = Product::all();
        $item=Offer::find($id);
       
        return view('productmodule::offers.edit',compact('item','products','arr'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
     
        $offer = Offer::find($id);
        $data = $request->only('ar','en','price','date_from','date_to');
       $data_products = $request->only('products');
       if($request->img)
           $data['image'] = $this->upload($request->img, 'offer');
       
       $offer=$offer->update($data);
       OfferProduct::where('offer_id',$id)->delete();
       foreach($data_products['products'] as $key)
       {
       
        OfferProduct::create(['offer_id'=>$id,'product_id'=>$key]);
       }
       Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
       return redirect('dashboard/offers');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Offer::destroy($id);
       
        OfferProduct::where('offer_id','id')->delete();
        

        \Session::flash('success', 'تم الحذف بنجاح'); 
        return redirect()->back();
    }
}
