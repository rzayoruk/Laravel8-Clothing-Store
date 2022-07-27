@extends('layouts.shopcontact')

@section('title', 'ShopCart')


@section('content')
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @php
                    $total=0;
                @endphp
                @foreach($datalist as $rows)
                <tr>
                    <td class="align-middle"><img src="{{Storage::url($rows->product->image)}}" alt="" style="width: 50px;"><a href="{{route('product',['id'=>$rows->product->id,'slug'=>$rows->product->slug])}}">
                        {{$rows->product->title}}</a></td>
                    <td class="align-middle">${{$rows->product->price}}</td>
                    <td class="align-middle">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                        <form action="{{route('user_shopcart_update',['id'=>$rows->id])}}" method="post">
                            @csrf
                            <input type="number" name="quantity" class="form-control form-control-sm bg-secondary text-center" min="1" max="{{$rows->product->quantity}}" value="{{$rows->quantity}}" onchange="this.form.submit()">
                        </form>
                        </div>
                    </td>
                    <td class="align-middle">${{$rows->product->price*$rows->quantity}}</td>
                    <td class="align-middle"><a href="{{route('user_shopcart_delete',['id'=>$rows->id])}}" onclick="return confirm('The record will be deleted Sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="35" alt="" align="center"></a></td>
                </tr>
                    @php
                    $total+=$rows->product->price*$rows->quantity;
                    @endphp
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{$total}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$100</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">${{$total+100}}</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
