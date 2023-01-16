@extends('frontend.master')

@section('content')
    <div class="banner1">
        <div class="container">
                <h3 class=" mt-5 text-center "><a href="{{ url('/') }}">Home</a> / <span>Dashboard</span></h3>
        </div>
    </div>
    <div class="container" style="height: auto; margin-top:20px;">
        <div class="well">
            <h1 class="text-center">Product List</h1>
            <a href="{{ url('/vendor/product/create') }}" class="btn btn-sm btn-success pull-right" style="margin-top:-35px" >Add Product</a>
           <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
           </table>
        </div>
    </div>
@endsection