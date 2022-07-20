<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use http\Message;
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



    public function aboutus()
    {
        $setting=Setting::first();
        $slider=Product::select('title','image','price')->limit(15)->get();
        return view("home.about",['setting'=>$setting,'page'=>'home','slider'=>$slider]);
    }

    public function references()
    {
        $setting=Setting::first();
        $slider=Product::select('title','image','price')->limit(15)->get();
        return view("home.references",['setting'=>$setting,'page'=>'home','slider'=>$slider]);
    }



    public function faq()
    {
        $setting=Setting::first();
        return view("home.index",['setting'=>$setting]);
    }

    public function contact()
    {
        $setting=Setting::first();
        $slider=Product::select('title','image','price')->limit(15)->get();
        return view("home.contact",['setting'=>$setting,'page'=>'home','slider'=>$slider]);
    }

    public function sendmessage(Request $request)
    {
        $setting=Setting::first();
        $slider=Product::select('title','image','price')->limit(15)->get();
        $data=new \App\Models\Message();
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->subject=$request->input('subject');
        $data->message=$request->input('message');
        $data->phone=$request->input('phone');


        $data->save();
        return redirect()->route('contact')->with('success','The message was recorded');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

    }



}
