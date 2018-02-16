<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
	<div class="container">
		<!--HEADER-->
		<div class="row">
    		<div class="col-md-12">
      			<h1>Page Admin</h1>
					<div class="row">
    					<div class="">
    						@include('partials.menu')
    					</div>
					</div>
			</div>
		</div>

		<!--MAIN-->
		<div class="container">

			<div class="row">
				<div class="col-md-9">
					@yield('content')
				</div>
														
				<div class="col-md-3">
				</div>
			</div>
				
				
				<!--FOOTER-->
				<div class="row"> 
					<div class="col-md-12">
						<div class="row ">
		    				<div class="">
		    					@include('partials.menuFooter')
		    				</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	
	@section('scripts')
	<script src="{{asset('js/app.js')}}"></script>
	@show
</body>
</html>