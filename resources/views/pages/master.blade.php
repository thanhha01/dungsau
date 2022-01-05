<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8">
		<base href="{{asset('')}}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('/pages/css/reset.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/pages/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('/pages/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/pages/css/font-awesome-4.7.0/css/font-awesome.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('/pages/css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/pages/css/responsive.css') }}">
	</head>
	<body>
		<div id="wrapper">
			<div id="page-wrapper">
				@include('pages.layout.header')

				@yield('content')

				@include('pages.layout.footer')

			</div>
		</div>
		@include('pages.layout.modal')
		<script src="{{ asset('/pages/js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('/pages/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/pages/js/wow.min.js') }}"></script>
		<script src="{{ asset('/pages/js/my_js.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function() {
	            $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                }
	            });
	        });
		</script>
	</body>
</html>