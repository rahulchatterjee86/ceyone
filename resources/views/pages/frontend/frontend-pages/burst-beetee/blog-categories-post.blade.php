@extends('layouts.frontend.master')
@section('title',  trans('frontend.cat_post_label') .' < '. get_site_title() )
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
<script>
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
  
});
</script>

  <!--Page Title-->
  <section class="page-title post-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
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

                <?php if($cat_details->parent==10){?>
                    <div class="inner-box-gallery">
                        
                        <div class="image-box">
                            <figure class="image"><a href="">
                                @if(get_blog_postmeta_data($row->id, 'featured_image'))
                                <a href="{{ get_image_url(get_blog_postmeta_data($row->id, 'featured_image')) }}"  data-toggle="lightbox" data-gallery="gallery">
                                    <img class="img-responsive" src="{{ get_image_url(get_blog_postmeta_data($row->id, 'featured_image')) }}" alt="{{ basename(get_blog_postmeta_data($row->id, 'featured_image')) }}">
                                </a>
                                @endif
                            </figure>
                        </div>
                    </div>
                <?php } else { ?>

                    <div class="inner-box">
        
                        <div class="image-box">
                            <figure class="image">
                                <a href="javascript:;">
                                    <img class="img-responsive" src="{{ get_image_url(get_blog_postmeta_data($row->id, 'featured_image')) }}" alt="{{ basename(get_blog_postmeta_data($row->id, 'featured_image')) }}">
                                </a>
                            </figure>
                            <h5 class="name"><a href="javascript:;">{!! $row->post_title !!}</a></h5>
                            <span class="designation"><div class="designation-code">{!! get_limit_string(string_decode($row->post_content), get_blog_postmeta_data($row->id, 'allow_max_number_characters_at_frontend')) !!}</div></span>
                        </div> 
                    </div>
                <?php } ?>

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