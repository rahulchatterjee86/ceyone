@extends('layouts.frontend.master')
@section('title', 'Gallery' .' < '. get_site_title() )
@section('content')

 <!--Page Title-->
 <section class="page-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Gallery</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Homepage</a></li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
<section class="news-section">
    <div class="auto-container">
        <?php $news_categories = $categoriesTree[1]['children'];?>
        <div class="row">
            @foreach($news_categories as $key => $row)
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ get_image_url($row['img_url']) }}" alt="" /></figure>
                        <a href="<?php echo url("/categories/".$row['slug']);?>" class="overlay-link"></a>
                    </div>
                    <div class="lower-content">
                        <h3><a href="<?php echo url("/categories/".$row['slug']);?>">{!! $row['name'] !!}</a></h3>
                
                        <a href="<?php echo url("/categories/".$row['slug']);?>" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- News Block End-->
   
        </div>
    </div>
</section>


@endsection