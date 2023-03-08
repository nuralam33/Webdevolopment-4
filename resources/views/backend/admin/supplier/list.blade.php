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
                <th>Vendor Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($vendors as $vendor)

            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->email }}</td>
                <td>{{ $vendor->phone }}</td>
                <td>
                    @if ($vendor->is_approved == 0)
                    <span class="badge badge-danger ">Pendding</span>
                    @else
                    <span class="badge badge-success ">Approved</span>
                    @endif
                </td>
                <td>
                    @if ($vendor->is_approved == 0)
                    <a href="{{ url('/admin/vendor/approved/'.$vendor->id) }}" class="bn btn-sm btn-info text-decoration-none">Approved</a>
                    @else
                    <a href="{{ url('/admin/vendor/pending/'.$vendor->id) }}" class="bn btn-sm btn-warning text-decoration-none ">Pendding</a>
                    @endif
                    <a href="{{ url('/admin/vendor/delete/'.$vendor->id) }}" class="bn btn-sm btn-danger text-decoration-none ">Delete</a>
                </td>
            </tr>
            @endforeach
            
        </table>
    </div>
    {{ $vendors->links() }}
</div>
@endsection