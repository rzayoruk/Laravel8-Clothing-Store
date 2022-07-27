@extends('layouts.shopcontact')

@section('title','References-' .$setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords',$setting->keywords)

@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">References</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">References</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Our References</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            {!! $setting->references !!}
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
            <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
            <div class="d-flex flex-column mb-3">
                <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="d-flex flex-column">
                <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection
