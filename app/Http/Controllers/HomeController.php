<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function categoryList()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }

    public function index(){
        return view("home.index");
    }

    public function test($id){
        return view("home.test",['id'=>$id]);
    }


}
