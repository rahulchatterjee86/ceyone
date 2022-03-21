@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_cart_title') .' < '. get_site_title() )

@section('content')
  {{-- @include('pages.ajax-pages.cart-html')	 --}}
  @include('pages.ajax-pages.burst-beetee.cart')	
@endsection  

@section('scripts')
<script src="{{ URL::asset('public/burst-beetee/js/jquery.bootstrap-touchspin.js') }}"></script>
@endsection