@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_registration_title') .' - '. get_site_title())
@section('content')

@if($settings_data['general_options']['allow_registration_for_frontend'])

<!--Page Title-->
<section class="page-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
    <div class="auto-container">
        <div class="content-box">
            <h1>User Registration</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Homepage</a></li>
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

                <div class="form-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column1">
                        <div class="login-form default-form">
                            <div class="title-box text-center">
                                <h4> Let's Join Us</h4>
                                <div class="text">You are one step away to become a member of ceyone family</div>
                            </div>
                            @include('pages-message.notify-msg-error')
                            @include('pages-message.form-submit')  
                            
                            <form method="post" action="" enctype="multipart/form-data">
                                @include('includes.csrf-token')
                            
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Display Name</label>
                                        <input type="text" placeholder="{{ trans('frontend.display_name') }}" class="" value="{{ old('user_reg_display_name') }}" id="user_reg_display_name" name="user_reg_display_name">
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>User Name</label>
                                        <input type="text" placeholder="{{ trans('frontend.user_name') }}" class="" value="{{ old('user_reg_name') }}" id="user_reg_name" name="user_reg_name">
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Email</label>
                                        <input type="email" placeholder="{{ ucfirst( trans('frontend.email') ) }}" class="" id="reg_email_id" value="{{ old('reg_email_id') }}" name="reg_email_id">
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Mobile Number</label>
                                        <input type="text" maxlength="10" placeholder="Mobile Number" class="" id="reg_mobile_no" value="{{ old('reg_mobile_no') }}" name="reg_mobile_no">
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Password</label>
                                        <input type="password" placeholder="{{ ucfirst(trans('frontend.password')) }}" class="" id="reg_password" name="reg_password">
                                        <span class="icon flaticon-lock"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="{{ trans('frontend.retype_password') }}" class="" id="reg_password_confirmation" name="reg_password_confirmation">
                                        <span class="icon flaticon-lock"></span>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Secret key, It's need for password recovery</label>
                                        <input type="text" placeholder="{{ ucfirst(trans('frontend.secret_key')) }}" class="" id="reg_secret_key" name="reg_secret_key">
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group has-feedback" style="display: none;" >
                                        <input type="email" placeholder="Referrel Id" class="" id="reg_referrel_id" value="{{ old('reg_referrel_id') }}" name="reg_referrel_id">
                                    </div>

                                    @if(!empty($is_enable_recaptcha) && $is_enable_recaptcha == true)
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">  
                                            <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
                                        </div>
                                    @endif

                                    <div class="form-group text-center col-lg-12 col-md-12 col-sm-12">
                                        <button name="user_reg_submit" id="user_reg_submit" value="{{ trans('frontend.registration') }}" type="submit" class="theme-btn icon-btn-one small"><span>Register</span></button>
                                        <div class="rigester-now">Already Member? <a href="{{url ("/user/login")}}">Login Now</a></div>
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

@else
<br>
<p>{{ trans('frontend.user_reg_not_available_label') }}</p>
@endif
@endsection  