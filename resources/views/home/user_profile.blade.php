@extends('layouts.shopcontact')

@section('title', 'User Profile')


@section('content')
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-3 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <h1>User Panel</h1>
                        <hr>
                       <ul>
                           <li><a href="{{route('userprofile')}}"><h6>My Profile</h6></a></li>
                           <li><a href=""><h6>My Orders</h6></a></li>
                           <li><a href="{{route('myreviews')}}"><h6>My Reviews</h6></a></li>
                           <li><a href="{{route('user_shopcart')}}"><h6>My Shopcart</h6></a></li>
                           <li><a href="{{'user_products'}}"><h6>My Products</h6></a></li>
                           <li><a href="{{route('logout')}}"><h6>logout</h6></a></li>
                       </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        @include('profile.show')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
