@extends('layouts.admin')

@section('title', 'Edit Frequently Asked Question')

@section('javascript')
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
@endsection


@section('content')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                FAQ Edit
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit FAQ</h3>

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
                    <form role="form" action="{{route('admin_faq_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="number" name="position" value="{{$data->position}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" name="question" value="{{$data->question}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Answer</label>
                                <textarea id="answer" name="answer">{{$data->answer}}</textarea>
                                <script>
                                    CKEDITOR.replace( 'answer' );
                                </script>

                            </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" value="{{$data->status}}" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option selected="selected">{{$data->status}}</option>
                                <option>False</option>
                                <option>True</option>
                            </select><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-tah2-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
                <!-- /.box-body -->
                </form>

            </div>
            <!-- /.box-body -->
        </section>
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
