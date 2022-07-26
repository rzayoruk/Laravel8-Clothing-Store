@extends('layouts.shopcontact')

@section('title', 'Frequently Asked Questions')

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>
@endsection

@section('content')

<!-- Page Header Start -->

<!-- Page Header End -->

@php
$i=1;
@endphp
<!-- Contact Start -->
<div class="col-lg-7 mb-5">
    <div class="box-body">

            <div id="accordion">
            @foreach($datalist as $rows)
                <h3>{{$i}}.)  {{$rows->question}}</h3>
                <div><p>{!! $rows->answer !!}</p></div>


                @php
                $i++;
                @endphp
            @endforeach
            </div>
    </div>
</div>
@endsection
