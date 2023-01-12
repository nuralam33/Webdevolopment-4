<!DOCTYPE HTML>
<html>
<head>
<title>E-Commerce</title>
<!--css-->
<link href="{{ asset('/frontend/assets/') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/frontend/assets/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/frontend/assets/') }}/css/font-awesome.css" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
@include('frontend.includes.css')
<!--search jQuery-->
@include('frontend.includes.script')

	<style>
	.checkout{
		margin-top:50px;
		margin-bottom: 30px;
    	padding: 30px;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
		}
	</style>

</head>
<body>
		<!--header-->
		@include('frontend.includes.header')
		<!--header-->
		<!--banner-->
	@yield('content')
		<!--content-->
		@include('frontend.includes.footer')
</body>
</html>