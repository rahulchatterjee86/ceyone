<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Stylesheets -->
<link href="{{ URL::asset('public/burst-beetee/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/burst-beetee/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/burst-beetee/css/responsive.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ URL::asset('public/burst-beetee/images/favicon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ URL::asset('public/burst-beetee/images/favicon.png') }}" type="image/x-icon">

<link rel="stylesheet" href="{{ URL::asset('public/plugins/bootstrap-slider/slider.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('public/designer/scroll/jquery.mCustomScrollbar.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/common.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('public/frontend/css/price-range.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('public/plugins/iCheck/square/purple.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('public/sweetalert/sweetalert.css') }}" />

<script type="text/javascript" src="{{ URL::asset('public/burst-beetee/js/jquery.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/frontend/js/price-range.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/bootstrap-slider/bootstrap-slider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/designer/scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/frontend/js/common.js') }}"></script>

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js') }}"></script><![endif]-->
<!--[if lt IE 9]><script src="{{ URL::asset('public/burst-beetee/js/respond.js') }}"></script><![endif]-->
<style>
span.cart-number {
    position: relative;
    color: white;
    top: -21px;
    left: 24%;
}
span.active {
    color: #007bff;
}

</style>
@yield('styles')