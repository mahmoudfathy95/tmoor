<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserModuleController extends Controller
{
    public function showLogin()
    {
        return view('usermodule::login');
    }



    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials = $request->only('email','password');
      $credentials['status']=1;
              if (Auth::guard('admin')->attempt($credentials)){
            Alert::success('تمت العملية بنجاح','تم تسجيل الدخول بنجاح');
            return redirect('dashboard');
        }
        Alert::error('فشلت العملية','ليست لديك صلاحية للدخول ');
        return redirect()->back();
    }
    public function logout()
    {
        if (Auth::guard('admin')->logout()){
            Alert::success('تمت العملية بنجاح','تم تسجيل الخروج بنجاح');
            return redirect()->route('login');
        }
        Alert::error('فشلت العملية','حدث خطأ ولم يتم تسجيل الخروج');

        return redirect()->back();
    }

    public function showRegister()
    {
        return view('usermodule::register');
    }
}
