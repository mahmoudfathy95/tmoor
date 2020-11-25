<?php

namespace Modules\AreaModule\Http\Controllers\api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\AreaModule\Transformers\CityResource;

use Modules\AreaModule\Entities\City;

class AreaControllerApi extends Controller
{
    use ApiResponseHelper;

    public function AllCity(Request $request)
    {
        try{
            $lang = $request->header('lang');
            $all = City::all();
            $all = CityResource::collection($all);
            return $this->setCode(200)->setData($all)->send();
        }catch(Exception $e)
        {
            return $this->setCode(400)->setError($e->getMessage())->send();
        }
        
       
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('areamodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('areamodule::create');
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
        return view('areamodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('areamodule::edit');
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
        //
    }
}
