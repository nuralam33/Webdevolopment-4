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
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($sizes as $size )
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $size->name }}</td>
                <td>
                   @if ($size->status == 1)
                   <a href="" class="btn btn-sm btn-primary">Active</a>
                   @else
                   <a href="" class="btn btn-sm btn-danger">Unactive</a>
                       
                   @endif
                </td>
                <td>
                    <a href="{{ url('/size/edit/'.$size->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ url('/size/delete/'.$size->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
    {{ $Sizes->links() }}
</div>
@endsection