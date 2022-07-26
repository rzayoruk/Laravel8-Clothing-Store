
@extends('layouts.admin')

@section('title', 'Add Product')


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
               FAQ Add
            </h1>
        </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Product</h3>

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
                    <form role="form" action="{{route('admin_faq_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Position</label>
                                <input type="number" name="position" class="form-control" value="0">
                            </div>
                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" name="question" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Answer</label>
                                <textarea id="answer" name="answer"></textarea>
                                <script>
                                    CKEDITOR.replace( 'answer' );
                                </script>

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
                            <button type="submit" class="btn btn-primary">Add Product</button>
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
