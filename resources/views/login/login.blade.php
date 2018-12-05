<!DOCTYPE html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet"/>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
<!-- //font-awesome icons -->
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		<form action="{{url('dologin')}}" method="post">
			<input type="text" class="ggg" name="name" placeholder="" required="" value="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			{{csrf_field()}}
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>
		<p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
</div>
</div>

<script src="">{{ asset('js/bootstrap.js') }}</script>
<script src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ asset('js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
</body>
</html>
