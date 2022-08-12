@extends('layouts.shopcontact')

@section('title', 'User Profile')


@section('content')
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            @include('home.usermenu')
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
