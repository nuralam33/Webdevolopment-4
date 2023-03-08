@extends('frontend.master')
@section('content')
    
			<div class="container">
				<h3 class=" mt-5 text-center "><a href="{{ url('/') }}">Home</a> / <span>User Authentication</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="container" style="height: auto;">
			<div class="card" style="">
				<div class="card-body">
					@if (session()->has('success'))
					<h3 class="mt-5 text-center"><div class="alert alert-success ">{{ session()->get('success') }}</div></h3> 
                	@endif
					@if (session()->has('error'))
					<h3 class="mt-5 text-center"><div class="alert alert-danger ">{{ session()->get('error') }}</div></h3> 
                	@endif
					<div class="col-lg-12 checkout">
						<div class="row">
							<div class="col-md-6">
								{{-- login part --}}
								<h3 class="text-center">Login</h3>
								<form action="{{ route('login') }}" method="post">
								@csrf
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="Enter Your Email">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" />
									</div>
									<button class="btn btn-primary">Login</button>
								</form>
							</div>
								{{--  --}}
							<div class="col-md-6">
								<h3 class="text-center">Register</h3>
								<form action="{{ route('register') }}" method="post">
									@csrf
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" class="form-control" placeholder="Enter Your Name"/>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="Enter Your Email"/>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone"/>
									</div>
									<div class="form-group">
										<label>Address</label>
										<textarea name="address" rows="5"  class="form-control" placeholder="Enter Address"></textarea>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" />
									</div>
									
										<button class="btn btn-primary">Register</button>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
