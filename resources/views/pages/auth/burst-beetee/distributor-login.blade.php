@extends('layouts.frontend.master')
@section('title', 'Distributor Login' .' - '. get_site_title())
@section('content')
<!--Page Title-->
<section class="page-title post-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
  <div class="auto-container">
      <div class="content-box">
          <h1>Login - Register</h1>
          <ul class="bread-crumb clearfix">
              <li><a href="index.html">Homepage</a></li>
              <li>Login - Register</li>
          </ul>
      </div>
  </div>
</section>
<!--End Page Title-->

<!-- login Section -->
<section class="login-section">
  <div class="auto-container">

      <div class="outer-box">
          <div class="row">
              <div class="image-column col-lg-5 col-md-12 col-sm-12">
                  <div class="inner-column">
                      <div class="image-box" style="background-image:url({{ URL::asset('public/burst-beetee/images/resource/login-img.jpg') }});">
                          <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/login-img.jpg') }}" alt=""></figure>
                      </div>
                  </div>
              </div>

              <div class="form-column col-lg-7 col-md-12 col-sm-12">
                  <div class="inner-column">
                      <div class="login-form default-form">
                          <div class="title-box text-center">
                              <h4>Distributor Login</h4>
                              <div class="text">Lorem ipsum dolor sit amet, consectetur adipisci. Integer posuere vulputate condimentum</div>
                          </div>
                          @include('pages-message.notify-msg-error')
                          @include('pages-message.form-submit')
                          <form method="post" action="{{route('otp.distributor')}}" enctype="multipart/form-data">
                              @include('includes.csrf-token')
                              <div class="row">
                                  <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                      <label>Email</label>
                                      <input type="text" name="login_username" placeholder="Type Here" required="">
                                      <span class="icon flaticon-email-4"></span>
                                  </div>

                                  <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                      <label>Password</label>
                                      <input type="password" name="login_password" placeholder="Type Here" required="">
                                      <span class="icon flaticon-padlock"></span>
                                      <a href="{{ route('user-forgot-password-page') }}" class="pwd">Forgot Password?</a>
                                  </div>

                                  <div class="form-group text-center col-lg-12 col-md-12 col-sm-12">
                                      <button type="submit" class="theme-btn icon-btn-one small"><span>Login</span></button>
                                      <div class="rigester-now">Not Member? <a href="{{ route('vendor-registration-page') }}">Register Now</a></div>
                                      <div class="rigester-now">Are you a user? <a href="{{ route('user-login-page') }}">Login Here</a></div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End login Section -->
@endsection