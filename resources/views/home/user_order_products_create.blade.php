@extends('layouts.shopcontact')

@section('title', 'Add Order Products')

@section('content')




    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <form action="{{route('user_order_store')}}" method="post">
            @csrf
            <div class="col-lg-8">

                <div class="mb-4">

                   <strong>Total :${{$total+100}}</strong>
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Address Line</label>
                            <input class="form-control" type="text" name="address" value="{{Auth::user()->address}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">card Info</h4>
                    <div class="row">

                        <div class="col-md-6 form-group">
                            <label>Card Owner</label>
                            <input class="form-control" name="cardowner" value="{{Auth::user()->name}}" type="text" placeholder="Card Owner">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Card Number</label>
                            <input class="form-control" name="cardnumber"  type="number" placeholder="CardNumber">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Date</label>
                            <input class="form-control" name="dates" type="text" placeholder=" Valid Dates mm/yy">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Date</label>
                            <input class="form-control" name="key" type="text" placeholder="Secret Key">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <div class="d-flex justify-content-between">
                            <p>--</p>
                            <p>$--</p>
                        </div>

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{$total}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$100</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{$total+100}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <input type="hidden" name="total" value="{{$total+100}}">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
    <!-- Checkout End -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection
