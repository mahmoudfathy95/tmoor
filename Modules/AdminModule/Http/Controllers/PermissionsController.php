<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Repository\PermissionRepository;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $permissions = $this->permissionRepository->findAll()->groupBy('title');
        return view('adminmodule::permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return redirect()->route('permissions.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string'
        ]);
        $data = $request->except('_token');
        $data['guard_name']='admin';
        $this->permissionRepository->store($data);
        return redirect()->route('permissions.index')->withSuccessMessage('تم اضافة الصلاحية بنجاح');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return redirect()->route('permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return redirect()->route('permissions.index');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($title)
    {
        $this->permissionRepository->destroy($title);
        Alert::success('تمت العمليه بنجاح','تم حذف الصلاحيه بنجاح');
        return redirect()->route('permissions.index');
    }
}
