<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Repository\PermissionRepository;
use Modules\AdminModule\Repository\RoleRepository;
use PHPUnit\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository= $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles = $this->roleRepository->getRoles();
        return view('adminmodule::roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $permissionGroups = $this->permissionRepository->findAll()->groupBy('title');
        return view('adminmodule::roles.create',compact('permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string'
        ]);
        $data = $request->except('_token');
        $data['guard_name']='admin';
        $this->roleRepository->setRole($data);
        Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
        return redirect()->route('roles.index')->withSuccessMessage('تم إضافة الصلاحية');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('adminmodule::roles.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->getRole($id);
        $permissionGroups = $this->permissionRepository->findAll()->groupBy('title');
        return view('adminmodule::roles.edit',compact('role','permissionGroups'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string'
        ]);
        $data = $request->except('_token');

        $role = $this->roleRepository->updateRole($id,$data);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            if($this->roleRepository->deleteRole($id))
                Alert::error('فشلت العملية','لم يتم الحذف لوجود مستخدمين مرتبطين بهذه المجموعة');
            Alert::success('تمت العملية بنجاح','تم الحذف بنجاح');
            return redirect()->route('roles.index');
        }catch (\Exception $e){
            Alert::warning('وجد خطأ تقنى','برجاء التواصل مع مطورى البرنامج');
            return redirect()->route('roles.index');
        }

    }



}
