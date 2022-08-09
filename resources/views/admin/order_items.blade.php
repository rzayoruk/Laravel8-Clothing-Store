<html>
<head>
    <title>Order Edit Page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>



    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Edit
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Message</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
@include('home.message')

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin_order_update',['id'=>$data->id])}}" method="post">
                        @csrf
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Receiver</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>E-mail</th>
                                    <th>Total</th>
                                    <th>IP</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Status</th>
                                    <th>Note</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$data->id}}</td>
                                        <td>{{$data->user->name}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->address}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->total}}</td>
                                        <td>{{$data->IP}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>{{$data->updated_at}}</td>
                                        <td>
                                            <select name="status">
                                                <option selected>{{$data->status}}</option>
                                                <option>Accepted</option>
                                                <option>Cancelled</option>
                                                <option>Shipped</option>
                                                <option>Completed</option>
                                            </select>
                                        </td>
                                        <td><textarea>{{$data->note}}</textarea></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Order State</button>
                    </form>
                </div>
                <!-- /.box-body -->
                </form>

            </div>
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Note</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @foreach($datalist as $rows)
                    <tr>
                        <td class="align-middle"><img src="{{Storage::url($rows->product->image)}}" alt="" style="width: 50px;"><a href="{{route('product',['id'=>$rows->product->id,'slug'=>$rows->product->slug])}}">
                                {{$rows->product->title}}</a></td>
                        <td class="align-middle">${{$rows->product->price}}</td>
                        <td class="align-middle">{{$rows->quantity}}</td>
                        <td class="align-middle">${{$rows->amount}}</td>
                        <form role="form" action="{{route('admin_order_item_update',['id'=>$rows->id])}}" method="post">
                            @csrf
                            <td>
                                <select name="status">
                                    <option selected>{{$rows->status}}</option>
                                    <option>Accepted</option>
                                    <option>Cancelled</option>
                                    <option>Shipped</option>
                                    <option>Completed</option>
                                </select>
                            </td>
                            <td><textarea>{{$rows->note}}</textarea></td>
                            <button type="submit" class="btn btn-primary">Update Order item State</button>
                        </form>
                        <td class="align-middle"><a href="#" onclick="return confirm('The record will be deleted Sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="35" alt="" align="center"></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- /.box-body -->
        </section>
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</body>
</html>
