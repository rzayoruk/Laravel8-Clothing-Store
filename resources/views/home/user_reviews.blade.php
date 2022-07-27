@extends('layouts.shopcontact')

@section('title', 'User Profile')


@section('content')
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-3 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <h3>User Panel</h3>
                       <ul>
                           <li><a href="{{route('userprofile')}}">My Profile</a></li>
                           <li><a href="">My Orders</a></li>
                           <li><a href="{{route('myreviews')}}">My Reviews</a></li>
                           <li><a href="{{route('user_shopcart')}}">My Shopcart</a></li>
                           <li><a href="{{route('user_products')}}">My Products</a></li>
                           <li><a href="{{route('logout')}}">logout</a></li>
                       </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Title</th>
                                <th>Subject</th>
                                <th>Review</th>
                                <th>Rate</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @include('home.message')
                            @foreach($datalist as $rows)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$rows->id}}</td>
                                    <td><a href="{{route('product',['id'=>$rows->product->id,'slug'=>$rows->product->slug])}}" target="_blank">{{$rows->product->title}}</a></td>
                                    <td>{{$rows->subject}}</td>
                                    <td>{{$rows->review}}</td>
                                    <td>{{$rows->rate}}</td>
                                    <td>{{$rows->status}}</td>
                                    <td>{{$rows->created_at}}</td>
                                    <td width="50"><a href="{{route('delete_myreview',['id'=>$rows->id])}}" onclick="return confirm('The record will be deleted Sure?')">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
