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
use Modules\BankModule\Entities\Bank;

class UserAdminController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $admins = User::get();
        return view('adminmodule::users.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $banks = Bank::all();
       return view('adminmodule::users.create',compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name','email','password','bank_id');
        $validatedData = $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>'required',
            'bank_id'=>'required'
            ]);


        $data['password'] = Hash::make($data['password']);
        $data['status']=1;
        $admin = User::create($data);

        Alert::success('تمت العملية بنجاح','تم اضافة البيانات بنجاح');
        return redirect('dashboard/user');

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
        $admin = User::find($id);
        $banks = Bank::all();
        return view('adminmodule::users.edit',compact('admin','banks'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name','email');
        $validatedData = $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
                'bank_id'=>'required',
            ]);

        if(isset($request->password))
        {
            $data['password'] = Hash::make($request->password);
        }

        $user = User::find($id);
        $user->update($data);
        Alert::success('تمت العملية بنجاح','تم تعديل البيانات بنجاح');
        return redirect('dashboard/user');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            User::destroy($id);
            Alert::success('تمت العملية بنجاح','تم حذف مسؤول النظام بنجاح');
            return redirect('dashboard/user');
        }catch (\Exception $e){
            Alert::warning('يوجد خطأ تقنى','برجاء التواصل مع مطورى البرنامج');
            return redirect('dashboard/user');
        }


    }
}
