@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if (session()->has('success'))
                <div class="alert alert-success text-center">{{ session()->get('success') }}</div>    
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/size/store') }}" method="post"/>
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control" name="category_id">
                             @foreach ( $categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                            <label>Size Name</label>
                            <input type="text" name="name" placeholder="Product Size " class="form-control" >
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option disabled>Select A Status</option>
                                <option value="{{1}}">{{'active'}}</option>
                                <option value="{{0}}">{{'unactive'}}</option>
                            </select>
                        <button type="submit" class="btn btn-block btn-success">Submit</button>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection