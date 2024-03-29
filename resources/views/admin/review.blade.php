
@extends('layouts.admin')

@section('title', 'Review List')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Review Table
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">

                            <a href="{{route('adminhome')}}" type="button" class="btn btn-block btn-primary" style="width: 200px">Home</a>
                        @include('home.message')
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Product Title</th>
                                    <th>Subject</th>
                                    <th>Review</th>
                                    <th>Rate</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rows)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$rows->id}}</td>
                                        <td><a href="{{route('admin_user_show',['id'=>$rows->user->id])}}" target="_blank">{{$rows->user->name}}</a></td>
                                        <td><a href="{{route('product',['id'=>$rows->product->id,'slug'=>$rows->product->slug])}}" target="_blank">{{$rows->product->title}}</a></td>
                                        <td>{{$rows->subject}}</td>
                                        <td>{{$rows->review}}</td>
                                        <td>{{$rows->rate}}</td>
                                        <td>{{$rows->status}}</td>
                                        <td>{{$rows->created_at}}</td>
                                        <td width="100">
                                            <a href="{{route('admin_review_edit',['id'=>$rows->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1300, height=700')"><img src="{{asset('assets/admin/images')}}/edit.png" height="35" alt="" align="left"></a>
                                            <a href="{{route('admin_review_delete',['id'=>$rows->id])}}" onclick="return confirm('The record will be deleted Sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="35" alt="" align="right"></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
