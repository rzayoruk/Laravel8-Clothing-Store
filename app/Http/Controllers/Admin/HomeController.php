<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        //echo "Admin Anasayfası";
        //exit();
        return view("admin.index");
    }

    public function login(){

        return view('admin.login');
    }

    public function logincheck(Request $request){

        if ($request->isMethod('post'))
        {
            $credentials=$request->only('email','password');
            if (Auth::attempt($credentials))
            {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }
            return back()->withErrors([
                'email'=>'The provided email does not match our records.',]);



        }
        else
        {
            return view('admin.login');
        }
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');

    }


}
