<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function categoryList()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }

    public function index()
    {
        $setting=Setting::first();
        $slider=Product::select('title','image','price')->limit(15)->get();
        //print_r($setting);
        //exit();
        $data=['setting'=>$setting,'slider'=>$slider,'page'=>'home'];
        return view("home.index",$data);
    }

    public function references()
    {
        $setting=Setting::first();
        return view("home.index",['setting'=>$setting]);
    }

    public function aboutus()
    {
        $setting=Setting::first();
        return view("home.index",['setting'=>$setting]);
    }

    public function faq()
    {
        $setting=Setting::first();
        return view("home.index",['setting'=>$setting]);
    }

    public function contact()
    {
        $setting=Setting::first();
        return view("home.index",['setting'=>$setting]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');

    }



}
