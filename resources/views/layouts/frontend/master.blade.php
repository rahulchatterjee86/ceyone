<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.frontend.burst-beetee.head')
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <!-- spinner #4 -->
            <div class="spinner-block">
                <!-- spinner #4 effect -->
                <div class="spinner-eff spinner-eff-4">
                    <div class="bar bar-top"></div>
                    <div class="bar bar-right"></div>
                    <div class="bar bar-bottom"></div>
                    <div class="bar bar-left"></div>
                </div>
            </div>
        </div>

        @include('includes.frontend.burst-beetee.header')

        @yield('content')

        @include('includes.frontend.burst-beetee.insta')

        @include('includes.frontend.burst-beetee.footer')

        <input type="hidden" name="hf_base_url" id="hf_base_url" value="{{ url('/') }}">
        <input type="hidden" name="cart_url" id="cart_url" value="{{ route('cart-page') }}">
        <input type="hidden" name="currency_symbol" id="currency_symbol" value="{{ $_currency_symbol }}">

    </div><!-- Page Wrapper -->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    @include('includes.frontend.burst-beetee.foot')
</body>

</html>