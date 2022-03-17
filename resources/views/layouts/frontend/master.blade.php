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
    
    <!-- Main Header-->
    @include('includes.frontend.burst-beetee.header')
    @yield('content')
  
    

    <!-- instagram Feed -->
      @include('includes.frontend.burst-beetee.insta')
    <!--End instagram Feed -->

    <!-- Main Footer -->
        @include('includes.frontend.burst-beetee.footer')
    <!-- End Main Footer -->

</div><!-- Page Wrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
@include('includes.frontend.burst-beetee.foot')
</body>

</html>
