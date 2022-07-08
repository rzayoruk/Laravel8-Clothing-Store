
@extends('layouts.admin')

@section('title', 'Edit Product')




@section('content')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Product Add
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
                    <form role="form" action="{{route('admin_product_update',['id'=>$data->id])}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>

                                <select name="category_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    @foreach($datalist as $rows)
                                        <option value="{{$rows->id}}" @if ($rows->id==$data->category_id) selected="selected" @endif>{{$rows->title}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                                <label>Price</label>
                                <input type="number" name="price" value="{{$data->price}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity" value="{{$data->quantity}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Min. Quantity</label>
                                <input type="number" name="minquantity" value="{{$data->minquantity}}" value="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tax</label>
                                <input type="number" name="tax" value="{{$data->tax}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Detail</label>
                                <input type="text" name="detail" value="{{$data->detail}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" value="{{$data->status}}" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected">{{$data->status}}</option>
                                    <option>False</option>
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
