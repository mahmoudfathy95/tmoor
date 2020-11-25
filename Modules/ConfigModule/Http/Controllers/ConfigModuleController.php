<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Config;
use Modules\ConfigModule\Entities\ConfigTranslation;
use RealRashid\SweetAlert\Facades\Alert;

class ConfigModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $configs = Config::get();
        return view('configmodule::config.edit',compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('configmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        foreach($request->ar as $key)
        {
            foreach($key as $ke=>$value)
            {
                $config = Config::where('key',$ke)->first();
                ConfigTranslation::where('config_id',$config->id)->where('locale','ar')->update(['value'=>$value]);
                ConfigTranslation::where('config_id',$config->id)->where('locale','en')->update(['value'=>$value]);
            }
        }

        foreach($request->en as $key)
        {
            foreach($key as $ke=>$value)
            {
                $config = Config::where('key',$ke)->first();
                ConfigTranslation::where('config_id',$config->id)->where('locale','en')->update(['value'=>$value]);
            }
        }


        Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
        return redirect('dashboard/config');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('configmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('configmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
