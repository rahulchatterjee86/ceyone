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
                @include('pages.frontend.user-account.burst-beetee.user-account-sidebar')

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
                                @elseif(Request::is('user/account/my-offers') )
                                    @include('pages.frontend.user-account.my-offers')
                                @elseif(Request::is('user/account/affiliation_points') )
                                    @include('pages.frontend.user-account.affiliation-points')
                                @elseif(Request::is('user/account/aff_pro_points') )
                                    @include('pages.frontend.user-account.aff-pro-points')
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