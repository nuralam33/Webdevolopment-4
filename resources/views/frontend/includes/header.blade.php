<div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
					</div>
					<div class="top-right">
					<ul>
						<li><a href="#">Checkout</a></li>
						@if (auth()->check())
							<li><a href="{{ route('login') }}" class="badge badge-danger">{{ auth()->user()->name }}</a></li>
						<li>
							<a href="#" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
			  				 Logout</a>
							   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
							</li>
						@else
							<li><a href="{{ route('login') }}">User Login</a></li>
							<li><a href="{{ route('register') }}">User Register </a></li>
							
						@endif
						@if (session()->has('vendorId'))
							<li><a href="{{url('/vendor/dashboard') }}" class="badge badge-danger">{{ session()->get('vendorName') }}</a></li>
							<li><a href="{{url('/vendor/logout') }}">Logout</a></li>
						@else
							<li><a href="{{url('/vendor/register') }}">Vendor Login</a></li>
							<li><a href="{{url('/vendor/register') }}">Vendor Account </a></li>
						@endif
					</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="{{ url('/') }}">New Shop <span>Shop anywhere</span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{ url('/') }}" class="act">Home</a></li>	
									<!-- Mega Menu -->
									@foreach ($categories as $category )
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="col-sm-3  multi-gd-img">
													@foreach ($category->subcategory as $subcategory)
													<ul class="multi-column-dropdown">
														<li><a href="products.html">{{ $subcategory->name }}</a></li>
													</ul>
												@endforeach
												</div>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>
									@endforeach
									
								</ul>
							</div>
							</nav>
						</div>
						<div class="header-right2">
							@if ($cartProducts > 0)
								<div class="cart box_1">
									<a href="{{ url('/checkout') }}">
										<h3> <div class="total">
											<span class=""></span>({{ $cartProducts }} items)</div>
											<img src="{{ asset('/frontend/assets/') }}/images/bag.png" alt="" />
										</h3>
									</a>
								</div>
							@else
								<div class="cart box_1">
									<a href="#">
										<h3> <div class="total">
											<span class=""></span>({{ $cartProducts }}items)</div>
											<img src="{{ asset('/frontend/assets/') }}/images/bag.png" alt="" />
										</h3>
									</a>
									<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
									<div class="clearfix"> </div>
								</div>	
								</div>
							@endif
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>