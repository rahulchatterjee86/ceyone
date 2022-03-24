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

<div class="sidebar-page-container alternate">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="blog">
                    @foreach($testimonials_data as $row)
                    <!-- News Block -->
                    <div class="news-block">
                        <div class="inner-box">
                            <div class="lower-content">
                                <span class="cat">{!! $row->testimonial_client_name !!}</span>
                                <h3><a href="blog-single.html">"{!! $row->post_title !!}"</a></h3>
                        
                                <div class="text">{!! get_limit_string(string_decode($row->post_content), 200) !!}</div>
                                <a href="{{ route('testimonial-single-page', $row->post_slug)}}" class="read-more">View More <span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection