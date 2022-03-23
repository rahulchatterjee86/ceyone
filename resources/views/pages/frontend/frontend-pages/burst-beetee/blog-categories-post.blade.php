@extends('layouts.frontend.master')
@section('title',  trans('frontend.cat_post_label') .' < '. get_site_title() )
@section('content')

  <!--Page Title-->
  <section class="page-title" style="background-image:url(images/background/5.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <h1>{!! $cat_details->name !!}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Achievers</a></li>
                <li>{!! $cat_details->name !!}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Team Section -->
<section class="team-section style-two alternate">
    <div class="auto-container">
        <div class="row">
            @if(count($blogs_cat_post['posts']) > 0)  
            @foreach($blogs_cat_post['posts'] as $row)

            <div class="team-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="designation">{!! get_limit_string(string_decode($row->post_content), get_blog_postmeta_data($row->id, 'allow_max_number_characters_at_frontend')) !!}</span>
                    <div class="image-box">
                        <h5 class="name"><a href="javascript:;">{!! $row->post_title !!}</a></h5>
                        <figure class="image"><a href="javascript:;"><img src="{{ get_image_url(get_blog_postmeta_data($row->id, 'featured_image')) }}" alt=""></a></figure>
                    </div>
                </div>
            </div>

            @endforeach
            @endif

            <!-- Team Block -->
        </div>
        
        <!--Styled Pagination-->
        {!! $blogs_cat_post['posts']->appends(Request::capture()->except('page'))->render() !!}
        {{-- <ul class="styled-pagination">
            <li><a href="#" class="arrow"><span class="flaticon-back-1"></span></a></li>
            <li><a href="#">01</a></li>
            <li><a href="#" class="active">02</a></li>
            <li><a href="#">03</a></li>
            <li><a href="#">04</a></li>
            <li><a href="#">05</a></li>
            <li><a href="#" class="arrow"><span class="flaticon-next-1"></span></a></li>
        </ul>                 --}}
        <!--End Styled Pagination-->
    </div>
</section>
<!--End Team Section -->

@endsection