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
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">

                                    <a href="{{route('user_product_create')}}" type="button" class="btn btn-block btn-primary" style="width: 200px">Add Product</a>
                                    @include('home.message')
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Title(s)</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Image Gallery</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datalist as $rows)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$rows->id}}</td>
                                                <td>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rows->category,$rows->category->title)}}</td>
                                                <td>{{$rows->title}}</td>
                                                <td>{{$rows->quantity}}</td>
                                                <td>{{$rows->price}}</td>
                                                <td>@if($rows->image)<img src="{{ Storage::url($rows->image) }}" height="60" alt="">@endif</td>
                                                <td>
                                                    <a href="{{route('user_product_image_create',['product_id'=>$rows->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100, height=700')">Go to Gallery</a>
                                                </td>
                                                <td>{{$rows->status}}</td>
                                                <td><a href="{{route('user_product_edit',['id'=>$rows->id])}}">Edit</a></td>
                                                <td><a href="{{route('user_product_delete',['id'=>$rows->id])}}" onclick="return confirm('The record will be deleted Sure?')">Delete</a></td>

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


@endsection
