
@extends('layouts.admin')

@section('title', 'Frequently Asked Question List')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Faq Table
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            @include('home.message')
                            <a href="{{route('admin_faq_create')}}" type="button" class="btn btn-block btn-primary" style="width: 200px">Add Faq</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Position</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rows)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$rows->id}}</td>
                                        <td>{{$rows->position}}</td>
                                        <td>{{$rows->question}}</td>
                                        <td>{!! $rows->answer !!}</td>
                                        <td>{{$rows->status}}</td>
                                        <td width="100"><a href="{{route('admin_faq_edit',['id'=>$rows->id])}}"><img src="{{asset('assets/admin/images')}}/edit.png" height="35" alt="" align="left"></a><a href="{{route('admin_faq_delete',['id'=>$rows->id])}}" onclick="return confirm('The record will be deleted Sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="35" alt="" align="right"></a></td>
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
