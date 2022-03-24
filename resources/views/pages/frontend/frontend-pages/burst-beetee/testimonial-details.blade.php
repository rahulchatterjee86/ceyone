@extends('layouts.frontend.master')
@section('title', trans('frontend.testimonials_details_page_title') .' < '. get_site_title() )
@section('content')

<section class="page-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Testimonials</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Homepage</a></li>
                <li>Testimonials</li>
            </ul>
        </div>
    </div>
</section>

<section class="testimonial-section">
    <div class="auto-container">
        <div class="sec-title">
            
        </div>

        <div class="row">
            <div class="carousel-column col-lg-12 col-md-12 col-sm-12">
                <div class="carousel-outer">
                    <!-- Testimonial Carousel -->
                    <div class="testimonial-carousel owl-carousel owl-theme">
                      <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <figure class="image-box">
                                @if(!empty($testimonials_data_by_slug['testimonial_image_url']))
                                    <img src="{{ get_image_url($testimonials_data_by_slug['testimonial_image_url']) }}" alt="">
                                @else
                                    <img src="{{ default_placeholder_img_src() }}" alt="">
                                @endif
                            </figure>
                            <!-- Text Box -->
                            <div class="text-box">
                                <div class="inner-box">
                                    <h3>"{!! $testimonials_data_by_slug['post_title'] !!}"</h3>
                                    <span class="icon flaticon-quote-1"></span>
                                    <p>{!! string_decode($testimonials_data_by_slug['post_content']) !!}</p>
                                    <div class="info-box">
                                        <h5 class="name">{!! $testimonials_data_by_slug['testimonial_client_name'] !!}</h5>
                                        <span class="designation">Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </div>
</section>

@endsection