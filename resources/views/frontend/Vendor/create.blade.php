@extends('frontend.master')

@section('content')
    <div class="banner1">
        <div class="container">
                <h1 class=" mt-5 text-center "><a href="{{ url('/') }}">Home</a> / <span>Dashboard</span></h1>
        </div>
    </div>
    <div class="container" style="height: auto; margin-top:20px;">
        <div class="well">
            <h1 class="text-center">Product Create</h1>
            <a href="{{ url('/vendor/dashboard') }}" class="btn btn-sm btn-success pull-right" style="margin-top:-35px" >Product List</a>
          
        </div>
    </div>
@endsection