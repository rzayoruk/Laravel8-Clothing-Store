
@extends('layouts.admin')

@section('title', 'Product List')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Product Table
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">

                            <a href="{{route('admin_product_create')}}" type="button" class="btn btn-block btn-primary" style="width: 200px">Add Product</a>

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
                                    <th>Actions</th>
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
                                            <a href="{{route('admin_image_create',['product_id'=>$rows->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100, height=700')">
                                                <img src="{{asset('assets/admin/images')}}/galleryicon.png" height="40" alt=""></a>
                                        </td>
                                        <td>{{$rows->status}}</td>
                                        <td width="100"><a href="{{route('admin_product_edit',['id'=>$rows->id])}}"><img src="{{asset('assets/admin/images')}}/edit.png" height="35" alt="" align="left"></a><a href="{{route('admin_product_delete',['id'=>$rows->id])}}" onclick="return confirm('The record will be deleted Sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="35" alt="" align="right"></a></td>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('footerjs')
    <script src="{{asset('assets')}}/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <script src="{{asset('assets')}}/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
