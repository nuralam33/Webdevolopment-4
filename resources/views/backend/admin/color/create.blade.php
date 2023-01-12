@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>    
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/color/store') }}" method="post"/>
                        @csrf
                        <div class="form-group">
                            <label>Categories</label>
                            <select class="form-control" name="category_id">
                                <option disabled>Select A Ctegory </option>
                                @foreach ( $categories as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        <div class="form-group">
                            <label>Color Name</label>
                            <input type="text" name="name" placeholder="enter your color name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option disabled>Select A Status</option>
                                <option value="{{1}}">{{'active'}}</option>
                                <option value="{{0}}">{{'unactive'}}</option>
                            </select>
                           </div>
                            
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