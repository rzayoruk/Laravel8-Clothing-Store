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
        $slider=Product::select('id','title','image','price','slug')->limit(3)->get();
        //print_r($slider);
        //exit();
        $data=['setting'=>$setting,'slider'=>$slider,'page'=>'home'];
        return view("home.index",$data);
    }

    public function product($id) //product bilgileri için
    {
        $data=Product::find($id);
       print_r($data);
       exit();
        //return view("home.about",['setting'=>$setting,'page'=>'home','slider'=>$slider]);
    }

    public function categoryproducts($id,$slug)
    {
        $setting=Setting::first();
        $datalist=Product::where('category_id',$id)->get();
        $data=Product::find($id);
        //print_r($data);
        //exit();
        return view("home.category_products",['setting'=>$setting,'page'=>'home','datalist'=>$datalist,'data'=>$data]);
    }



    public function aboutus()
    {
        $setting=Setting::first();
        return view("home.about",['setting'=>$setting]);
    }

    public function references()
    {
        $setting=Setting::first();
        return view("home.references",['setting'=>$setting]);
    }



    public function faq()
    {
        $setting=Setting::first();
        return view("home.index",['setting'=>$setting]);
    }

    public function contact()
    {
        $setting=Setting::first();
        return view("home.contact",['setting'=>$setting]);
    }

    public function sendmessage(Request $request)
    {
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
