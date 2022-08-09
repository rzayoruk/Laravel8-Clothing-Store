
@extends('layouts.admin')

@section('title', 'Admin Order Management')




@section('content')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Blank Page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank Page</li>
            </ol>
        </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Order List</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
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
                            <td>{{$rows->user->name}}</td>
                            <td>{{$rows->name}}</td>
                            <td>{{$rows->email}}</td>
                            <td>{{$rows->phone}}</td>
                            <td>{{$rows->address}}</td>
                            <td>${{$rows->total}}</td>
                            <td>{{$rows->created_at}}</td>
                            <td>{{$rows->status}}</td>
                            <td><a href="{{route('admin_order_show',['id'=>$rows->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1300, height=700')"><img src="{{asset('assets/admin/images')}}/edit.png" height="35" alt="" align="left"></a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
