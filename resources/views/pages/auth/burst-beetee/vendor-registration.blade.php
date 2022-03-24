@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_registration_title') .' - '. get_site_title())
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Distributer Registration</h1>
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
                                <h4> Let's Sign Up</h4>
                                <div class="text">It's free and always will be</div>
                            </div>
                            @include('pages-message.notify-msg-error')
                            @include('pages-message.form-submit')
						    @include('pages-message.notify-msg-success')
                            
                            <form method="post" action="" enctype="multipart/form-data">
                                @include('includes.csrf-token')
                            
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>First Name</label>
                                        <input type="text" placeholder="First Name" class="" value="{{ old('vendor_reg_display_name') }}" id="vendor_reg_display_name" name="vendor_reg_display_name">
                                        <span class="fa fa-user form-control-feedback"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Last Name" class="" value="{{ old('vendor_reg_name') }}" id="vendor_reg_name" name="vendor_reg_name">
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Email Address</label>
                                        <input type="email" placeholder="{{ ucfirst( trans('frontend.email') ) }}" class="" id="vendor_reg_email_id" value="{{ old('vendor_reg_email_id') }}" name="vendor_reg_email_id">
          <span class="fa fa-envelope form-control-feedback"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Password</label>
                                        <input type="password" placeholder="{{ ucfirst(trans('frontend.password')) }}" class="" id="vendor_reg_password" name="vendor_reg_password">
              <span class="fa fa-lock form-control-feedback"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="{{ trans('frontend.retype_password') }}" class="" id="vendor_reg_password_confirmation" name="vendor_reg_password_confirmation">
                                        <span class="fa fa-lock form-control-feedback"></span>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Address Line 1</label>
                                        <textarea id="vendor_reg_address_line_1" placeholder="{{ trans('frontend.address_line_1') }}" class="" name="vendor_reg_address_line_1">{!! old('vendor_reg_address_line_1') !!}</textarea>
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Address Line 2</label>
                                        <textarea id="vendor_reg_address_line_2" placeholder="{{ trans('frontend.address_line_2') }}" class="" name="vendor_reg_address_line_2">{!! old('vendor_reg_address_line_2') !!}</textarea>
                                        <span class="icon flaticon-email-4"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>City</label>
                                        <input type="text" placeholder="{{ trans('frontend.city') }}" class="" value="{{ old('vendor_reg_city') }}" id="vendor_reg_city" name="vendor_reg_city">
                                        <span class="icon flaticon-lock"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>State</label>
                                        <select name="vendor_reg_state" id="vendor_reg_state" class="">
                                            <option value="">State</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                        <span class="icon flaticon-lock"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Zip / Postal Code</label>
                                        <input type="number" placeholder="{{ trans('frontend.zip_postal_code') }}" class="" value="{{ old('vendor_reg_zip_code') }}" id="vendor_reg_zip_code" name="vendor_reg_zip_code">
                                        <span class="icon flaticon-lock"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label>Phone Number</label>
                                        <input type="number" placeholder="{{ ucfirst(trans('frontend.phone')) }}" class="" id="vendor_reg_phone_number" name="vendor_reg_phone_number" value="{{ old('vendor_reg_phone_number') }}" min="0">
                                        <span class="icon flaticon-lock"></span>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <span class="button-checkbox t-and-c-button-checkbox">
                                            <input type="checkbox" name="t_and_c" id="t_and_c" class="shopist-iCheck" value="1"> &nbsp;
                                            <a href="#" data-toggle="modal" data-target="#t_and_c_m"> {!! trans('frontend.t_and_c_label') !!} </a>
                                          </span>
                                    </div>

                                    @if(!empty($is_enable_recaptcha) && $is_enable_recaptcha == true)
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">  
                                            <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
                                        </div>
                                    @endif

                                    <div class="form-group text-center col-lg-12 col-md-12 col-sm-12">
                                        <button name="vendor_reg_submit" id="vendor_reg_submit" value="Submit for Registration" type="submit" class="theme-btn icon-btn-one small"><span>Submit for Registration</span></button>
                                        <div class="rigester-now">Already Member? <a href="{{url ("/distributor/login")}}">Login Now</a></div>
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

<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="t_and_c_m_l" aria-hidden="true">    
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{!! trans('frontend.t_and_c_label') !!}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! string_decode(get_vendor_settings_data()['term_n_conditions']) !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">{!! trans('frontend.agree_label') !!}</button>
        </div>
      </div>
    </div>
  </div>
@endsection  