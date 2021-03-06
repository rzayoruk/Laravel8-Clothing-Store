<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Review;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Image;
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
        $slider=Product::select('id','title','image','price','slug')->limit(5)->get();
        $daily= Product::select('id','title','image','price','slug')->limit(4)->inRandomOrder()->get();
        $last= Product::select('id','title','image','price','slug')->limit(4)->orderByDesc('id')->get();
        $picked= Product::select('id','title','image','price','slug')->limit(5)->inRandomOrder()->get();
        $data=[
            'setting'=>$setting,
            'slider'=>$slider,
            'daily'=>$daily,
            'last'=>$last,
            'picked'=>$picked,
            'page'=>'home'
        ];

        //print_r($data);
        //exit();

        return view("home.index",$data);
    }

    public static function countReview($id)
    {
        return \App\Models\Review::where('product_id',$id)->where('status','=','True')->count();
    }


    public static function avrgReview($id)
    {
        return \App\Models\Review::where('product_id',$id)->average('rate');
    }

    public function product($id) //product detail bilgileri için
    {
        $data=Product::find($id);
        $datalist=Image::where('product_id',$id)->get();
        $reviews=\App\Models\Review::where('product_id',$id)->where('status','=','True')->get(); //model or ?
       //print_r($reviews);
       //exit();
        return view("home.product_detail",['data'=>$data,'datalist'=>$datalist,'reviews'=>$reviews]);
    }

    public function getproduct(Request $request) // slug adress satrında gözükmesi için var
    {
        $data=Product::where('title',$request->input('search'))->first();
        return redirect()->route('product',['id'=>$data->id,'slug'=>$data->slug]);
    }

    public function addtocart($id)
    {
        echo 'added to cart';
        $data=Product::find($id);
        print_r($data);
        exit();
        //return view("home.about",['setting'=>$setting,'page'=>'home','slider'=>$slider]);
    }

    public function categoryproducts($id,$slug) // slug adress satrında gözükmesi için var
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
        $datalist=Faq::all()->sortBy('position');
        return view("home.faq",['datalist'=>$datalist]);
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
