@extends('layouts.frontend.master')
@section('title', $page_data->post_title .' < '. get_site_title())
@section('content')

 <!--Page Title-->
 <section class="page-title post-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
    <div class="auto-container">
        <div class="content-box">
            <h1>{!! string_decode($page_data->post_title) !!}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Homepage</a></li>
                <li>{!! string_decode($page_data->post_title) !!}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- About Section -->
<section class="about-section style-two">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="title">Ceyone</span>
                        <h2>{!! string_decode($page_data->post_title) !!}<h2>
                    </div>
                    <div class="text-box">
                        <?php //dd($page_data); ?>
                        {!! string_decode($page_data->post_content) !!}
                    </div>
                    <div class="btn-box">
                        {{-- <a href="about.html" class="theme-btn icon-btn-one"><span class="btn-title">Services</span></a> --}}
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column">

                    <?php if ($page_data->post_subtitle) { ?>
                        <div class="caption-box">
                            {!! string_decode($page_data->post_subtitle) !!}  
                        </div>
                    <?php } ?>

                    
                    <div class="image-box">
                        <figure class="image">
                            <?php if ($page_data->post_subtitle) { ?>
                                <img src="{{url ("$page_data->post_image1")}}" alt="">
                            <?php } else {?>
                                <img src="{{url ("/public/burst-beetee/images/resource/page-default.jpg")}}" alt="">
                            <?php } ?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

@endsection