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
                <th>Name</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
            @foreach ($brands as $brand )
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $brand->category->name }}</td>
                    <td>
                        {{ $brand->name }}
                    </td>
                    <td>
                        <a href="{{ url('/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $brands->links() }}
</div>
@endsection