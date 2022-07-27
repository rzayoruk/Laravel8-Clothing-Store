@extends('layouts.shopcontact')

@section('title', 'User Profile')

@section('javascript')
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

@endsection

@section('content')
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-3 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <h3>User Panel</h3>
                       <ul>
                           <li><a href="{{route('userprofile')}}">My Profile</a></li>
                           <li><a href="">My Orders</a></li>
                           <li><a href="{{route('myreviews')}}">My Reviews</a></li>
                           <li><a href="">My Shopcart</a></li>
                           <li><a href="{{route('user_products')}}">My Products</a></li>
                           <li><a href="{{route('logout')}}">logout</a></li>
                       </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <div class="box-body">


                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('user_product_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>

                                        <select name="category_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($datalist as $rows)
                                                <option value="{{$rows->id}}" @if ($rows->id==$data->category_id) selected="selected" @endif>{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rows,$rows->title)}}</option>
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
                                        <textarea id="detail" name="detail">{{$data->detail}}</textarea>
                                        <script>
                                            CKEDITOR.replace( 'detail' );
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($data->image)<img src="{{ Storage::url($data->image) }}" height="60" alt="">@endif
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
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
