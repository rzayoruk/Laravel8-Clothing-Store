
@extends('layouts.admin')

@section('title', 'Message List')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Message Table
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Admin Note</th>
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
                                        <td>{{$rows->subject}}</td>
                                        <td>{{$rows->message}}</td>
                                        <td>{{$rows->note}}</td>
                                        <td>{{$rows->status}}</td>

                                        <td width="100"><a href="{{route('admin_message_edit',['id'=>$rows->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100, height=700')"><img src="{{asset('assets/admin/images')}}/edit.png" height="35" alt="" align="left"></a><a href="{{route('admin_message_delete',['id'=>$rows->id])}}" onclick="return confirm('The record will be deleted Sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="35" alt="" align="right"></a></td>
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
