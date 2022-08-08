<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Order::where('user_id',Auth::id())->get();
        return view('home.user_order',['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $total= $request->input('total');
        return view('home.user_order_products_create',['total'=>$total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #TODO: GET creditcard info

        $data= new Order;
        $data->user_id=Auth::id();
        $data->name=$request->input('name');
        $data->address=$request->input('address');
        $data->email=$request->input('email');
        $data->phone=$request->input('phone');
        $data->total=$request->input('total');
        //$data->status=$request->input('status');
        $data->note=$request->input('note');
        $data->IP=$_SERVER['REMOTE_ADDR'];

        $data->save();

        $datalist=Shopcart::where('user_id',Auth::id())->get();
        foreach ($datalist as $rows)
        {
            $data2=new Orderitem;
            $data2->user_id=Auth::id();
            $data2->product_id=$rows->product_id;
            $data2->order_id=$data->id;
            $data2->price=$rows->product->price;
            $data2->quantity=$rows->quantity;//
            $data2->amount=$rows->quantity*$rows->product->price;
            $data2->note="New";
            $data2->save();
        }
        $data3=Shopcart::where('user_id',Auth::id());
        $data3->delete();

        return redirect()->route('user_orders')->with('success','Ordered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,$id)
    {
        $datalist= Orderitem::where('user_id',Auth::id())->where('order_id',$id)->get();

        return view('home.user_orderitem',['datalist'=>$datalist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
