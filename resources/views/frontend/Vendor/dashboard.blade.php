@extends('frontend.master')

@section('content')
    <div class="banner1">
        <div class="container">
                <h3 class=" mt-5 text-center "><a href="{{ url('/') }}">Home</a> / <span>Dashboard</span></h3>
        </div>
    </div>
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>    
            @endif
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
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->index+ 1 }}</td>
                <td>
                    <img src="{{ asset('/product/'.$product->image) }}" height="50px" width="50px" class="m-0" alt="">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->qty }}</td>
                <td>
                    @if ($product->status == 0)
                    <span class="badge badge-danger">Pendding</span>
                    @else
                    <span class="badge badge-success">Approved</span>
                    @endif
                </td>
                <td>
                   <a href="{{ url('/vendor/product/edit') }}" class="btn btn-sm btn-info">Edit</a>
                   <a href="{{ url('/vendor/product/delete') }}"class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
           
           </table>
        </div>
    </div>
@endsection