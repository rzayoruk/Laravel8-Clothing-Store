
@extends('layouts.admin')

@section('title', 'Settings')

@section('javascript')
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection


@section('content')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Settings
            </h1>
        </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>

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
                    <form role="form" action="{{route('admin_setting_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <input type="text" name="id" value="{{$data->id}}" class="form-control">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="{{$data->title}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" value="{{$data->description}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" name="company" value="{{$data->company}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$data->address}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{$data->phone}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" name="fax" value="{{$data->fax}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$data->email}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Smtp Server</label>
                                <input type="text" name="smtpserver" value="{{$data->smtpserver}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Smtp Email</label>
                                <input type="text" name="smtpemail" value="{{$data->smtpemail}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Smtp Password</label>
                                <input type="password" name="smtppassword" value="{{$data->smtppassword}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Smtp Port</label>
                                <input type="number" name="smtpport" value="{{$data->smtpport}}" value="5" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="facebook" value="{{$data->facebook}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="instagram" value="{{$data->instagram}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" name="twitter" value="{{$data->twitter}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="text" name="youtube" value="{{$data->youtube}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>References</label>
                                <textarea id="references" name="references">{{$data->references}}</textarea>
                                <div id="summernote"></div>
                                <script>
                                    $('#references').summernote({
                                        placeholder: 'Hello stand alone ui',
                                        tabsize: 2,
                                        height: 120,
                                        toolbar: [
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']],
                                            ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']],
                                            ['insert', ['link', 'picture', 'video']],
                                            ['view', ['fullscreen', 'codeview', 'help']]
                                        ]
                                    });
                                </script>
                            </div>
                            <div class="form-group">
                                <label>contact</label>
                                <textarea id="contact" name="contact">{{$data->contact}}</textarea>
                                <div id="summernote"></div>
                                <script>
                                    $('#contact').summernote({
                                        placeholder: 'Hello stand alone ui',
                                        tabsize: 2,
                                        height: 120,
                                        toolbar: [
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']],
                                            ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']],
                                            ['insert', ['link', 'picture', 'video']],
                                            ['view', ['fullscreen', 'codeview', 'help']]
                                        ]
                                    });
                                </script>
                            </div>
                            <div class="form-group">
                                <label>aboutus</label>
                                <textarea id="aboutus" name="aboutus">{{$data->aboutus}}</textarea>
                                <div id="summernote"></div>
                                <script>
                                    $('#aboutus').summernote({
                                        placeholder: 'Hello stand alone ui',
                                        tabsize: 2,
                                        height: 120,
                                        toolbar: [
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']],
                                            ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']],
                                            ['insert', ['link', 'picture', 'video']],
                                            ['view', ['fullscreen', 'codeview', 'help']]
                                        ]
                                    });
                                </script>
                            </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" value="{{$data->status}}" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected">{{$data->status}}</option>
                                    <option>False</option>
                                    <option>True</option>
                                </select><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-tah2-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>



                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update Settings</button>
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
