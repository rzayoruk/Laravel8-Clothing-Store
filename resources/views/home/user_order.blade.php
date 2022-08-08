@extends('layouts.shopcontact')

@section('title', 'User Product')


@section('content')
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-3 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <h3>User Panel</h3>
                       <ul>
                           <li><a href="{{route('userprofile')}}">My Profile</a></li>
                           <li><a href="{{route('user_orders')}}">My Orders</a></li>
                           <li><a href="{{route('myreviews')}}">My Reviews</a></li>
                           <li><a href="{{route('user_shopcart')}}">My Shopcart</a></li>
                           <li><a href="{{route('user_products')}}">My Products</a></li>
                           <li><a href="{{route('logout')}}">logout</a></li>
                       </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pb-4">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    @include('home.message')
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datalist as $rows)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$rows->id}}</td>
                                                <td>{{$rows->name}}</td>
                                                <td>{{$rows->email}}</td>
                                                <td>{{$rows->phone}}</td>
                                                <td>{{$rows->address}}</td>
                                                <td>${{$rows->total}}</td>
                                                <td>{{$rows->created_at}}</td>
                                                <td>{{$rows->status}}</td>
                                                <td><a href="{{route('user_order_show',['id'=>$rows->id])}}">Edit</a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection
