@extends('layouts.shopcontact')

@section('title', 'Order Items')


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
                    <th>Amount</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @foreach($datalist as $rows)
                <tr>
                    <td class="align-middle"><img src="{{Storage::url($rows->product->image)}}" alt="" style="width: 50px;"><a href="{{route('product',['id'=>$rows->product->id,'slug'=>$rows->product->slug])}}">
                        {{$rows->product->title}}</a></td>
                    <td class="align-middle">${{$rows->product->price}}</td>
                    <td class="align-middle">{{$rows->quantity}}</td>
                    <td class="align-middle">${{$rows->amount}}</td>
                    <td class="align-middle">{{$rows->note}}</td>
                    <td class="align-middle">{{$rows->status}}</td>
                    <td class="align-middle"><a href="#" onclick="return confirm('The record will be deleted Sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="35" alt="" align="center"></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{$rows->order->total-100}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$100</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">${{$rows->order->total}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
