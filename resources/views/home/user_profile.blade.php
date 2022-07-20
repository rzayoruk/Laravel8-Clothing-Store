@extends('layouts.shopcontact')

@section('title', 'User Profile')


@section('content')
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-3 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <h3>User Panel</h3>
                       <ul>
                           <li><a href="{{route('myprofile')}}">My Profile</a></li>
                           <li><a href="">My Orders</a></li>
                           <li><a href="">My Reviews</a></li>
                           <li><a href="">My Shopcart</a></li>
                           <li><a href=" ">My Messages</a></li>
                           <li><a href="{{route('logout')}}">logout</a></li>
                       </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <div class="position-relative" style="z-index: 1;">
                        <@include('profile.show')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
