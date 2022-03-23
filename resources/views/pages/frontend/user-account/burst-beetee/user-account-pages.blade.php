@extends('layouts.frontend.master')
@if(Request::is('user/account'))
  @section('title',  trans('frontend.frontend_user_dashboard_title') .' < '. get_site_title() )
@elseif (Request::is('user/account/dashboard'))
  @section('title',  trans('frontend.frontend_user_dashboard_title') .' < '. get_site_title() )
@elseif (Request::is('user/account/my-address'))
  @section('title',  trans('frontend.frontend_user_address_title') .' < '. get_site_title() )
@elseif (Request::is('user/account/my-address/add'))
  @section('title',  trans('frontend.frontend_user_address_add_title') .' < '. get_site_title() ) 
@elseif (Request::is('user/account/my-address/edit'))
  @section('title',  trans('frontend.frontend_user_address_edit_title') .' < '. get_site_title() )
@elseif (Request::is('user/account/my-profile'))
  @section('title',  trans('frontend.frontend_user_profile_edit_title') .' < '. get_site_title() )
@elseif (Request::is('user/account/my-orders'))
  @section('title',  trans('frontend.frontend_my_order_title') .' < '. get_site_title() )
@elseif (Request::is('user/account/my-saved-items'))
  @section('title',  trans('frontend.frontend_wishlist_items_title') .' < '. get_site_title() ) 
@elseif (Request::is('user/account/my-coupons'))
  @section('title',  trans('frontend.frontend_coupons_items_title') .' < '. get_site_title() )
@elseif (Request::is('user/account/download'))
  @section('title',  trans('frontend.frontend_download_options_title') .' < '. get_site_title() )  
@elseif(Request::is('user/account/order-details/*'))
  @section('title',  trans('frontend.user_order_details_page_title') .' < '. get_site_title() )  
@elseif(Request::is('user/account/bv-points'))
  @section('title',  trans('frontend.user_order_details_page_title') .' < '. get_site_title() ) 
@elseif(Request::is('user/account/my-offers'))
  @section('title',  'My offers' .' < '. get_site_title() )  
@elseif(Request::is('user/account/affiliation_points'))
@dd(12);
  @section('title',  'My offers' .' < '. get_site_title() )  
@endif
 
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/5.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <h1>Account</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Homepage</a></li>
                <li>Account</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Dashboard Section -->
<section class="dashboard-section">
    <div class="auto-container">
        <div class="dashboard-tabs">
            <div class="row">
                <div class="column col-lg-4 col-md-12 col-sm-12">
                    <!--Tab Btns-->
                    <ul class="tab-buttons">
                        @if(Request::is('user/account/dashboard') || Request::is('user/account'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('user-dashboard-page') }}"><i class="fa fa-dashboard"></i> {{ trans('frontend.dashboard') }}</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('user-dashboard-page') }}"><i class="fa fa-dashboard"></i> {{ trans('frontend.dashboard') }}</a></li>
                        @endif

                        @if( Request::is('user/account/my-address') ||  Request::is('user/account/my-address/add') ||  Request::is('user/account/my-address/edit') )
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('my-address-page') }}"><i class="fa fa-map-marker"></i> {{ trans('frontend.my_address') }}</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('my-address-page') }}"><i class="fa fa-map-marker"></i> {{ trans('frontend.my_address') }}</a></li>
                        @endif

                        @if(Request::is('user/account/my-orders') || Request::is('user/account/order-details/**'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('my-orders-page') }}"><i class="fa fa-file-text-o"></i> {{ trans('frontend.my_orders') }}</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('my-orders-page') }}"><i class="fa fa-file-text-o"></i> {{ trans('frontend.my_orders') }}</a></li>
                        @endif

                        @if(Request::is('user/account/my-saved-items'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('my-saved-items-page') }}"><i class="fa fa-save"></i> {{ trans('frontend.my_saved_items') }}</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('my-saved-items-page') }}"><i class="fa fa-save"></i> {{ trans('frontend.my_saved_items') }}</a></li>
                        @endif

                        @if(Request::is('user/account/my-coupons'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('my-coupons-page') }}"><i class="fa fa-scissors"></i> {{ trans('frontend.my_coupons') }}</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('my-coupons-page') }}"><i class="fa fa-scissors"></i> {{ trans('frontend.my_coupons') }}</a></li>
                        @endif
                        @if(Request::is('user/account/affiliation_points'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('affiliation_points') }}"><i class="fa fa-gift"></i>Affiliations</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('affiliation_points') }}"><i class="fa fa-gift"></i>Affiliations</a></li>
                        @endif
                        @if(Request::is('user/account/aff_pro_points'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('aff_pro_points') }}"><i class="fa fa-gift"></i>Affiliations Points</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('aff_pro_points') }}"><i class="fa fa-gift"></i>Affiliations Points</a></li>
                        @endif
                        @if(is_frontend_user_logged_in() && Session::get('shopist_frontend_user_role') == 'Vendor')
                            @if(Request::is('user/account/bv-points'))
                                <li class="tab-btn"><a class="nav-link active" href="{{ route('my-points') }}"><i class="fa fa-gift"></i>BV Points History</a></li>
                            @else
                                <li class="tab-btn"><a class="nav-link" href="{{ route('my-points') }}"><i class="fa fa-gift"></i>BV Points History</a></li>
                            @endif

                            @if(Request::is('user/account/my-offers'))
                                <li class="tab-btn"><a class="nav-link active" href="{{ route('my-offers') }}"><i class="fa fa-gift"></i>My Offers</a></li>
                            @else
                                <li class="tab-btn"><a class="nav-link" href="{{ route('my-offers') }}"><i class="fa fa-gift"></i>My Offers</a></li>
                            @endif


                        @endif

                        @if(Request::is('user/account/download'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('download-page') }}"><i class="fa fa-download"></i> {{ trans('frontend.user_account_download_title') }}</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('download-page') }}"><i class="fa fa-download"></i> {{ trans('frontend.user_account_download_title') }}</a></li>
                        @endif

                        @if(Request::is('user/account/my-profile'))
                            <li class="tab-btn"><a class="nav-link active" href="{{ route('my-profile-page') }}"><i class="fa fa-user"></i> {{ trans('frontend.my_profile') }}</a></li>
                        @else
                            <li class="tab-btn"><a class="nav-link" href="{{ route('my-profile-page') }}"><i class="fa fa-user"></i> {{ trans('frontend.my_profile') }}</a></li>
                        @endif

                        @if(is_frontend_user_logged_in())
                            <form method="post" action="{{ route('user-logout') }}" enctype="multipart/form-data">
                                @include('includes.csrf-token')
                                <li><button type="submit" class="btn btn-default btn-block"><i class="fa fa-circle-o-notch"></i> {!! trans('admin.sign_out') !!}</button> </li>
                            </form>
                        @endif
                    </ul>
                </div>

                <div class="column col-lg-8 col-md-12 col-sm-12">
                    <!--Tabs Container-->
                    <div class="tabs-content">
                        <!--Tab-->
                        <div class="tab active-tab">
                            <div class="tab-inner">
                                @if(Request::is('user/account/dashboard') || Request::is('user/account'))
                                    @include('pages.frontend.user-account.my-dashboard')
                                @elseif(Request::is('user/account/my-address'))
                                    @include('pages.frontend.user-account.my-address')
                                @elseif(Request::is('user/account/my-address/add'))
                                    @include('pages.frontend.user-account.add-address')
                                @elseif(Request::is('user/account/my-address/edit'))
                                    @include('pages.frontend.user-account.edit-address')
                                @elseif(Request::is('user/account/my-profile') )
                                    @include('pages.frontend.user-account.user-profile')
                                @elseif(Request::is('user/account/my-orders') )
                                    @include('pages.frontend.user-account.my-orders')
                                @elseif(Request::is('user/account/view-orders-details/*') )
                                    @include('pages.frontend.user-account.user-order-details')
                                @elseif(Request::is('user/account/my-saved-items') )
                                    @include('pages.frontend.user-account.my-wishlist')
                                @elseif(Request::is('user/account/my-coupons') )
                                    @include('pages.frontend.user-account.my-coupons')
                                @elseif(Request::is('user/account/download') )
                                    @include('pages.frontend.user-account.download')
                                @elseif(Request::is('user/account/order-details/*') )
                                    @include('pages.frontend.user-account.order-details')
                                @elseif(Request::is('user/account/bv-points') )
                                    @include('pages.frontend.user-account.my-points')
                                @elseif(Request::is('user/account/my-offers') )
                                    @include('pages.frontend.user-account.my-offers')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Dashboard Section -->
@endsection  