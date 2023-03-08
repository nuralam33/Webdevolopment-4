@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <center>@if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>    
        @endif</center>
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Vendor Name</th>
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
                    @if ($product->status == 0)
                    <a href="{{ url('/vendor/product/approved/'.$product->id) }}"class="btn btn-sm btn-info">Approve</a>
                    @else
                    <a href="{{ url('/vendor/product/pending/'.$product->id) }}"class="btn btn-sm btn-warning">Pending</a>
                    @endif
                   <a href="{{ url('/vendor/product/delete') }}"class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection