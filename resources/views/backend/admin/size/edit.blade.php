@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if (session()->has('success'))
                <div class="alert alert-success" text-aling="center" >{{ session()->get('success') }}</div>    
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/size/update/'.$color->id )}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option select disabled>Select A Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                               @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Size Name</label>
                            <input type="text" name="name" value="{{ $color->name }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option disabled>Select A Status</option>
                                <option value="{{1}}">{{'active'}}</option>
                                <option value="{{0}}">{{'unactive'}}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Update</button>
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