<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){

            if(Auth::attempt(['email' => $request->username, 'password' => $request->password])){
                //return redirect('/admin/dashboard');
                session()->flash('success','Successfully Logged in !');
                return redirect()->intended(route('admin.dashboard'));
            }else{
            session()->flash('error','Invalid Username or Password !');
            return redirect()->route('admin.login');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        session()->flush();
        session()->flash('success','Logout Successfully!');
        return redirect()->route('admin.login');
    }

}
