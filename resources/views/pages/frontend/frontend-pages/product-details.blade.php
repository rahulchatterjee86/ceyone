@extends('layouts.frontend.master')
@section('title', $single_product_details['_product_seo_title'] .' < '. get_site_title() )

@section('content')
  <div id="product_single_page">
    {{-- @include( 'frontend-templates.single-product.' .$appearance_settings['single_product']. '.' .$appearance_settings['single_product'] ) --}}
    @include( 'frontend-templates.single-product.burst-beetee.burst-beetee' )
  </div>
@endsection

@section('scripts')
<script src="{{ URL::asset('public/burst-beetee/js/jquery.bootstrap-touchspin.js') }}"></script>
@endsection