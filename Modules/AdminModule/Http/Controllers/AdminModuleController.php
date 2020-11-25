<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Modules\AdminModule\Entities\Admin;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class AdminModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $admins = Admin::get();
        return view('adminmodule::admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
       return view('adminmodule::admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name','email','password','gender');
        $validatedData = $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password'=>'required',
            'role_id'=>'required'
            ]);


        $data['password'] = Hash::make($data['password']);
        $data['status']=1;
        $admin = Admin::create($data);
        $role = Role::find($request->role_id);
        $admin->assignRole($role);

        Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
      return redirect('dashboard/admin');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('adminmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();
        return view('adminmodule::admins.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name','email','gender');
        $validatedData = $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
                'role_id'=>'required',
            ]);

        if(isset($request->password))
        {
            $data['password'] = Hash::make($request->password);
        }

        $user = Admin::find($id);
        $user->update($data);
        $role = Role::find($request->role_id);
//        dd($user->roles()->first()->id);
        if($user->roles()->count() >0 && $role->id != $user->roles()->first()->id)
            $user->removeRole($user->roles()->first());
        $user->assignRole($role);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect('dashboard/admin');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            Admin::destroy($id);
            Alert::success('تمت العملية بنجاح','تم حذف مسؤول النظام بنجاح');
            return redirect('dashboard/admin');
        }catch (\Exception $e){
            Alert::warning('يوجد خطأ تقنى','برجاء التواصل مع مطورى البرنامج');
            return redirect('dashboard/admin');
        }


    }
}
