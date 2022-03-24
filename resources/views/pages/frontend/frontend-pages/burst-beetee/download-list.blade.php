@extends('layouts.frontend.master')
@section('title', 'Downloads List' .' < '. get_site_title() )
@section('content')

 <!--Page Title-->
 <section class="page-title" style="background-image:url({{url("/public/burst-beetee/images/background/5.jpg")}});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Downloads</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Homepage</a></li>
                <li>Downloads</li>
            </ul>
        </div>
    </div>
 </section>

    <section class="">
        <div class="auto-container">
            <div class="row">
                @foreach($download_data as $row)
                            <div class="col-sm-6">
                        <div class="download-item-wrap">
                            <div class="item-details">
                                <ul>
                                    <li><a class="download-item" href="{{ get_image_url($row->brand_logo_img_url) }}" target="_blank"><img alt="" src="{{ url('/public/images/pdf.png') }}"></a></li>
                                    <li>
                                        <h4>
                                            <a href="{{ get_image_url($row->brand_logo_img_url) }}" target="_blank">{!! $row->name !!}</a>
                                        </h4>
                                        <a class="download-btn" href="{{ get_image_url($row->brand_logo_img_url) }}" target="_blank">Download</a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>    
    </section>
<!--End Page Title-->



@endsection