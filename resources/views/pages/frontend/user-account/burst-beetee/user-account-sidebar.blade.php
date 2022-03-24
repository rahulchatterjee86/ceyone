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