
@extends('layouts.admin')

@section('title', 'Add Category')




@section('content')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Category Add
            </h1>
        </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Category</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">


                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin_category_create')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>

                                <select name="parent_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="0" selected="selected">Main Category</option>
                                    @foreach($datalist as $rows)
                                    <option value="{{$rows->id}}">{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rows,$rows->title)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" name="keywords" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected">False</option>
                                    <option>True</option>
                                </select><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-tah2-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>

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
