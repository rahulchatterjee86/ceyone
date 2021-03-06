<style type="text/css">
  .carousel-control-next, .carousel-control-prev{
    z-index: 99999;
  }
</style>
<!--------------------------------------------  Banner ------------------------------------->
<?php $count = count($banner);?>
  @if($count > 0)
  <div class="header-with-slider home-slider">
    <div id="slider_carousel_1" class="carousel slide " data-ride="carousel">
      <a class="carousel-control-prev" href="#slider_carousel_1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slider_carousel_1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <div class="carousel-inner banner">
        @foreach($banner as $numb => $row)
          @if($numb == 0)
            <div class="carousel-item active">
              @if($row->image)
              <img src="{{ asset('public/uploads/' . $row->image) }}" class="d-block w-100" alt="" />
              <h1 class="slider-title">{{ $row->title }}</h1>
                @if(!empty($row->button_title))
                  <div class="button-hover-content">
                    <a href="{{ $row->button_link }}" class="slider-btn" tabindex="0">{{ $row->button_title }}</a>
                  </div>
                @endif
              @endif
            </div>
          @else
            <div class="carousel-item">
              @if($row->image)
              <img src="{{ asset('public/uploads/' . $row->image) }}" class="d-block w-100" alt="" />
              <h1 class="slider-title">{{ $row->title }}</h1>
                @if(!empty($row->button_title))
                  <div class="button-hover-content">
                    <a href="{{ $row->button_link }}" class="slider-btn" tabindex="0">{{ $row->button_title }}</a>
                  </div>
                @endif
              @endif
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="header-with-slider home-slider mobile banner">
    <div id="slider_carousel_2" class="carousel slide " data-ride="carousel">
      <a class="carousel-control-prev" href="#slider_carousel_2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slider_carousel_2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

            <div class="carousel-inner">
                          
                         @foreach($banner as $numb => $row)
                          @if($numb == 0)
                            <div class="carousel-item active">
                              <a href="#">
                              <img src="{{ asset('public/uploads/' . $row->image) }}" class="d-block w-100" alt=""></a>
                              <h1 class="slider-title">{{ $row->title }}</h1>
                                  <h1 class="slider-title">{{ $row->title }}</h1>
                                    @if(!empty($row->button_title))
                                      <div class="button-hover-content">
                                        <a href="{{ $row->button_link }}" class="slider-btn" tabindex="0">{{ $row->button_title }}</a>
                                      </div>
                                    @endif
                            </div>
                          @else

                            <div class="carousel-item">
                              <a href="#">
                              <img src="{{ asset('public/uploads/' . $row->image) }}" class="d-block w-100" alt=""></a>
                               <h1 class="slider-title">{{ $row->title }}</h1>
                                @if(!empty($row->button_title))
                                  <div class="button-hover-content">
                                    <a href="{{ $row->button_link }}" class="slider-btn" tabindex="0">{{ $row->button_title }}</a>
                                  </div>
                                @endif
                            </div>

                          @endif
                        @endforeach
                          

                                  </div>
    </div>
  </div>


  @else
  <div class="header-with-slider">
    <div id="slider_carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('public/images/sunglass.jpg') }}" class="d-block w-100" alt="" />
        </div>
      </div>
    </div>
  </div>
  @endif




<!----------------------------------------- end banner -------------------------------------------->


<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="single-box">
        <div class="all-service-main">
          <div class="all-service service-style">
            <ul class="service-list">
              <li><span class="service-name service-name-earth"></span><p>{!! trans('frontend.worldwide_service_label') !!}</p></li>
              <li><span class="service-name service-name-users"></span><p>{!! trans('frontend.24_7_help_center_label') !!}</p></li>
              <li><span class="service-name service-name-checkmark-circle"></span><p>{!! trans('frontend.safe_payment_label') !!}</p></li>
              <li><span class="service-name service-name-bicycle"></span><p>{!! trans('frontend.quick_delivery_label') !!}</p></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear_both"></div>  
    </div>
  </div>      
  
  @if(!empty($appearance_all_data['home_details']['collection_cat_list']) && count($appearance_all_data['home_details']['collection_cat_list']) > 0)
  <div id="categories_collection" class="categories-collection">
    <div class="row">
      @foreach($appearance_all_data['home_details']['collection_cat_list'] as $collection_cat_details)
        @if($collection_cat_details['status'] == 1)
        <div class="col-md-4 col-sm-12 pb-5">
          <div class="category">
            <a href="{{ route('categories-page', $collection_cat_details['slug']) }}">
              @if(!empty($collection_cat_details['category_img_url']))  
              <img class="d-block" src="{{ get_image_url($collection_cat_details['category_img_url']) }}">
              @else
              <img class="d-block" src="{{ default_placeholder_img_src() }}">
              @endif
              <div class="category-collection-mask"></div>
              <h3 class="category-title">{!! $collection_cat_details['name'] !!} <span>{!! trans('frontend.collection_label') !!}</span></h3>
            </a>
          </div>
        </div>
        @endif
      @endforeach
    </div>
    <div class="clear_both"></div>
  </div>
  @endif
  
  @if(!empty($appearance_all_data['home_details']['cat_name_and_products']) && count($appearance_all_data['home_details']['cat_name_and_products']) > 0) 
  <div class="top-cat-content">
    <div class="row">
    @foreach($appearance_all_data['home_details']['cat_name_and_products'] as $cat_details)
      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="single-mini-box2">
          <div class="top-cat-list-sub clearfix">
            <div class="img-div">
              @if(!empty($cat_details['cat_deails']['category_img_url']))  
              <img class="d-block" src="{{ get_image_url($cat_details['cat_deails']['category_img_url']) }}">
              @else
              <img class="d-block" src="{{ default_placeholder_img_src() }}">
              @endif
            </div>  
            <div class="img-title">
              <h4>{!! trans('frontend.super_deal_label') !!}</h4>  
              <h2>{!! $cat_details['cat_deails']['name'] !!}</h2>
              <span>{!! trans('frontend.exclusive_collection_label') !!}</span>
              <div class="cat-shop-now">
                <a href="{{ route('categories-page', $cat_details['cat_deails']['slug']) }}">{!! trans('frontend.shop_now_label') !!}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if($cat_details['cat_products']->count() > 0)
        @foreach($cat_details['cat_products'] as $items)
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="single-mini-box2">
              <div class="hover-product">
                <div class="hover">
                  @if(!empty($items->image_url)) 
                    <img class="d-block" src="{{ get_image_url( $items->image_url ) }}" alt="{{ basename( get_image_url( $items->image_url ) ) }}" />
                  @else
                    <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                  @endif
                  <div class="overlay">
                    <div class="overlay-content">
                      <button class="info quick-view-popup" data-id="{{ $items->id }}">{{ trans('frontend.quick_view_label') }}</button>  
                      <h2>{!! $items->title !!}</h2> 
                      @if( $items->type == 'simple_product' )
                        <h3>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($items->id, $items->price)), $selected_currency) !!}</h3>
                      @elseif( $items->type == 'configurable_product')
                        <h3>{!! get_product_variations_min_to_max_price_html($selected_currency, $items->id) !!}</h3>
                      @elseif( $items->type == 'customizable_product' || $items->type == 'downloadable_product')
                        @if(count(get_product_variations($items->id))>0)
                          <h3>{!! get_product_variations_min_to_max_price_html($selected_currency, $items->id) !!}</h3>
                        @else
                          <h3>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($items->id, $items->price)), $selected_currency) !!}</h3>
                        @endif
                      @endif
                      <ul>
                          @if( $items->type == 'simple_product' )  
                          <li><a href="" data-id="{{ $items->id }}" class="add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a></li>
                          <li><a href="" class="product-wishlist" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a></li>
                          <!-- <li><a href="" class="product-compare" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a></li>
                          <li><a href="{{ route('details-page', $items->slug ) }}" class="product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a></li> -->
                          @elseif( $items->type == 'configurable_product' )
                            <li><a href="{{ route( 'details-page', $items->slug ) }}" class="select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a></li>
                            <li><a href="" class="product-wishlist" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a></li>
                            <!-- <li><a href="" class="product-compare" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a></li>
                            <li><a href="{{ route('details-page', $items->slug ) }}" class="product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a></li> -->
                          @elseif( $items->type == 'customizable_product')  
                            @if(is_design_enable_for_this_product( $items->id ))
                              <li><a href="{{ route('customize-page', $items->slug) }}" class="product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a></li>
                              <li><a href="" class="product-wishlist" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a></li>
                              <!-- <li><a href="" class="product-compare" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a></li>
                              <li><a href="{{ route('details-page', $items->slug ) }}" class="product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a></li> -->
                            @else
                                <li><a href="" data-id="{{ $items->id }}" class="add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a href="" class="product-wishlist" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a></li>
                                <!-- <li><a href="" class="product-compare" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a></li>
                                <li><a href="{{ route('details-page', $items->slug ) }}" class="product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a></li> -->
                            @endif

                          @elseif( $items->type == 'downloadable_product' ) 

                            @if(count(get_product_variations($items->id))>0)
                              <li><a href="{{ route( 'details-page', $items->slug ) }}" class="select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a></li>
                            <li><a href="" class="product-wishlist" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a></li>
                            <!-- <li><a href="" class="product-compare" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a></li>
                            <li><a href="{{ route('details-page', $items->slug ) }}" class="product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a></li> -->
                            @else
                              <li><a href="" data-id="{{ $items->id }}" class="add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a></li>
                          <li><a href="" class="product-wishlist" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a></li>
                          <!-- <li><a href="" class="product-compare" data-id="{{ $items->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a></li>
                          <li><a href="{{ route('details-page', $items->slug ) }}" class="product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a></li> -->
                            @endif

                          @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          </div>
        @endforeach
      @endif
      <div class="clear_both"></div> <br><br>
    @endforeach
    </div>
  </div>    
  @endif




<!-- Top Square Slider Images-->
<div class="home-square-slider-images">
  <div class="row">
        <div class="col-sm-12 home-square-slider-images-inner">
                  <div class="slick-items active">
                        <div class="hover-product">
                            <img src="storage/app/public/images/personalcare.jpg"/>
                                <div class="text-container">
                                    <div class="content">
                                        <h3>Personal Care</h3>
                                    </div>
                                </div>
                                <div class="button-hover-content">
                                    <a href="<?php echo url("product/categories/personal-care");?>" class="orange-home-btn">SHOP Now</a>
                                </div>
                        </div>
                  </div>
                  <div class="slick-items active">
                        <div class="hover-product">
                            <img src="storage/app/public/images/healthcare.jpg"/>
                                <div class="text-container">
                                    <div class="content">
                                        <h3>Health Care</h3>
                                    </div>
                                </div>
                                <div class="button-hover-content">
                                    <a href="<?php echo url("product/categories/health-care");?>" class="orange-home-btn">SHOP Now</a>
                                </div>
                        </div>
                  </div>
                  <div class="slick-items active">
                        <div class="hover-product">
                            <img src="storage/app/public/images/oralcare.jpg"/>
                                <div class="text-container">
                                    <div class="content">
                                        <h3>Oral Care</h3>
                                    </div>
                                </div>
                                <div class="button-hover-content">
                                    <a href="<?php echo url("product/categories/oral-care");?>" class="orange-home-btn">SHOP Now</a>
                                </div>
                        </div>
                  </div>
                  <div class="slick-items active">
                        <div class="hover-product">
                            <img src="storage/app/public/images/agricare.jpg"/>
                                <div class="text-container">
                                    <div class="content">
                                        <h3>Agri Care</h3>
                                    </div>
                                </div>
                                <div class="button-hover-content">
                                    <a href="<?php echo url("product/categories/agri-care");?>" class="orange-home-btn">SHOP Now</a>
                                </div>
                        </div>
                  </div>
        </div>
  </div>
</div>
<!-- Top Square Slider Images-->












<!--Extra Msg Tab -->
<!-- <div class="extra-message-tab">  
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <ul class="nav nav-tabs tabs-left">
                  <li class="active"><a href="#notices_tab" data-toggle="tab">Notices</a></li>
                  <li><a href="#latest_news_tab" data-toggle="tab">Latest News</a></li>
              </ul>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
              <div class="tab-content">
                  <div class="tab-pane active" id="notices_tab">
                  <p><strong>Important Notice</strong></p>

<p>Dear Ceyone Distributors,</p>

<p>This is to inform that  Any OFFERS of Ceyone not to be given in any Social Media like Facebook,  Instagram, Whatsapp story, etc.</p>

<p>Also distributor should not mention DP in any social media post.</p>
                  </div>
                  <div class="tab-pane" id="latest_news_tab">
                      <div class="row">
                          <div class="col-sm-12">
                          <p>Dear Ceyone Distributors,</p>

                          <p>This is to inform that  Any OFFERS of Ceyone not to be given in any Social Media like Facebook,  Instagram, Whatsapp story, etc.</p>

                          <p>Also distributor should not mention DP in any social media post.</p>
                          </div>
                          
                      </div>
                  </div>
                  
              </div>
          </div>      
          <div class="clear_both"></div>    
      </div>
  </div>  -->
  <!--Extra Msg Tab -->  









  
  <!--Featured | Latest Product Tabs-->
  <div class="featured-latest-product-tab">  
      <div class="row">

              <div class="col-lg-12">
                  <ul class="nav nav-tabs">
                      <li class="active"><a href="#featured_product" data-toggle="tab">Featured</a></li>
                      <li><a href="#recently_launched_product" data-toggle="tab">Recently Launched</a></li>
                  </ul>
              </div>
      </div>
      <div class="row">
          <div class="col-lg-12">

          <div class="tab-content">
              <div class="tab-pane active" id="featured_product">
              <div class="featured-items-contents advanced-products-tab advanced-products-tab-home-tab-custom ">
              <div class="row">
                <div class="col-12">
                    <!-- <div class="content-title text-center">
                        <h2> <span>{!! trans('frontend.featured_products_label') !!}</span></h2>
                    </div> -->
                    <div class="slick-featured-items">
                        @foreach($advancedData['features_items'] as $key => $features_product)
                        <div class="slick-items">
                            <div class="hover-product">
                                <div class="hover">
                                    @if(!empty($features_product->image_url))
                                    <a href ="{{ route('details-page', $features_product->slug) }}"><img class="d-block" src="{{ get_image_url( $features_product->image_url ) }}" alt="{{ basename( get_image_url( $features_product->image_url ) ) }}" /></a>
                                    @else
                                    <a href ="{{ route('details-page', $features_product->slug) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a>
                                    @endif

                                    <div class="overlay">
                                        <button class="info quick-view-popup" data-id="{{ $features_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                                    </div>
                                </div> 

                                <div class="single-product-bottom-section">
                                    <h3><a href ="{{ route('details-page', $features_product->slug) }}">{!! $features_product->title !!}</a></h3>

                                    @if( $features_product->type == 'simple_product' )
                                    <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->price)), $selected_currency) !!}</p>
                                    @elseif( $features_product->type == 'configurable_product' )
                                    <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $features_product->id) !!}</p>
                                    @elseif( $features_product->type == 'customizable_product' || $features_product->type == 'downloadable_product')
                                    @if(count(get_product_variations($features_product->id))>0)
                                    <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $features_product->id) !!}</p>
                                    @else
                                    <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->price)), $selected_currency) !!}</p>
                                    @endif
                                    @endif

                                    <div class="title-divider"></div>
                                    <div class="single-product-add-to-cart">
                                        @if( $features_product->type == 'simple_product' )
                                        <a href="" data-id="{{ $features_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                        <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                        <a href="{{ route('details-page', $features_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                        @elseif( $features_product->type == 'configurable_product' )
                                        <a href="{{ route('details-page', $features_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>

                                        <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                                        <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                        <a href="{{ route('details-page', $features_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                        @elseif( $features_product->type == 'customizable_product' )
                                        @if(is_design_enable_for_this_product($features_product->id))
                                        <a href="{{ route('customize-page', $features_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>

                                        <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                                        <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                        <a href="{{ route('details-page', $features_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>

                                        @else
                                        <a href="" data-id="{{ $features_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                        <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                        <a href="{{ route('details-page', $features_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                        @endif
                                        @elseif( $features_product->type == 'downloadable_product' ) 
                                        @if(count(get_product_variations( $features_product->id ))>0)
                                        <a href="{{ route( 'details-page', $features_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                                        <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                        <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                                        <a href="{{ route('details-page', $features_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="" data-id="{{ $features_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                        <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                                        <a href="{{ route('details-page', $features_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                        @endif              
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> 
                </div>      
              </div>      
              </div>
              </div>
              <div class="tab-pane" id="recently_launched_product">
              <div class="row">
                    <div id="latest" class="home-latest-product col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                      <!-- <div class="special-products-slider-control">
                        <a href="#slick-lastest-items" data-slide="prev">
                          <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slick-lastest-items" data-slide="next">
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div> -->

                      <div class="">
                      <!-- single-mini-box -->

                        <div class="latest">
                          @if(count($advancedData['latest_items']) > 0)
                          <div id="slick-lastest-items" >
                            <?php $latest_numb = 1;?>
                            <div class="slick-lastest-items">
                              @foreach($advancedData['latest_items'] as $key => $latest_product)
                                @if($latest_numb == 1)
                                  <div class="slick-items active">
                                    <div class="hover-product">
                                      <div class="hover">
                                        @if(!empty($latest_product->image_url))
                                        <a href ="{{ route('details-page', $latest_product->slug) }}"><img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" /></a>
                                        @else
                                        <a href ="{{ route('details-page', $latest_product->slug) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a>
                                        @endif

                                        <div class="overlay">
                                          <button class="info quick-view-popup" data-id="{{ $latest_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                                        </div>
                                      </div> 

                                      <div class="single-product-bottom-section">
                                        <h3><a href ="{{ route('details-page', $latest_product->slug) }}">{!! $latest_product->title !!}</a></h3>

                                        @if( $latest_product->type == 'simple_product' )
                                          <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                                        @elseif( $latest_product->type == 'configurable_product')
                                          <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                                        @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                                          @if(count(get_product_variations($latest_product->id))>0)
                                            <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                                          @else
                                            <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                                          @endif
                                        @endif

                                        <div class="title-divider"></div>

                                        <div class="single-product-add-to-cart">
                                          @if( $latest_product->type == 'simple_product' )
                                            <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                            <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                          @elseif( $latest_product->type == 'configurable_product' )
                                            <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>

                                            <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                            <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                          @elseif( $latest_product->type == 'customizable_product' )
                                            @if(is_design_enable_for_this_product($latest_product->id))
                                              <a href="{{ route('customize-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>

                                              <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                            @else
                                              <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                                            @endif

                                          @elseif( $latest_product->type == 'downloadable_product' ) 
                                            @if(count(get_product_variations( $latest_product->id ))>0)
                                            <a href="{{ route( 'details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                                            <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                                            @else
                                            <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                                            <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                                            @endif  
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                  </div>  
                                @else
                                  <div class="slick-items-item">
                                    <div class="hover-product">
                                      <div class="hover">
                                        @if(!empty($latest_product->image_url))
                                        <a href ="{{ route('details-page', $latest_product->slug) }}"><img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" /></a>
                                        @else
                                        <a href ="{{ route('details-page', $latest_product->slug) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a>
                                        @endif

                                        <div class="overlay">
                                          <button class="info quick-view-popup" data-id="{{ $latest_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                                        </div>
                                      </div> 

                                      <div class="single-product-bottom-section">
                                        <h3><a href ="{{ route('details-page', $latest_product->slug) }}">{!! $latest_product->title !!}</a></h3>

                                        @if( $latest_product->type == 'simple_product' )
                                          <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                                        @elseif( $latest_product->type == 'configurable_product' )
                                          <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                                        @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                                          @if(count(get_product_variations($latest_product->id))>0)
                                            <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                                          @else
                                            <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                                          @endif
                                        @endif

                                        <div class="title-divider"></div>

                                        <div class="single-product-add-to-cart">
                                          @if( $latest_product->type == 'simple_product' )
                                            <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                            <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                          @elseif( $latest_product->type == 'configurable_product' )
                                            <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>

                                            <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                            <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                          @elseif( $latest_product->type == 'customizable_product')
                                            @if(is_design_enable_for_this_product($latest_product->id))
                                              <a href="{{ route('customize-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>

                                              <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                                            @else
                                              <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                                            @endif
                                          @elseif( $latest_product->type == 'downloadable_product') 
                                            @if(count(get_product_variations( $latest_product->id ))>0)
                                            <a href="{{ route( 'details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                                            <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                                            @else
                                            <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                                            <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                                            <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                                            @endif    
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @endif
                                <?php $latest_numb ++ ;?>
                              @endforeach
                            </div>  
                          </div>
                          @else
                            <p class="not-available">{!! trans('frontend.latest_products_empty_label') !!}</p>
                          @endif
                        </div>

                      </div>

                    </div> 

                    
                    <div class="clear_both"></div>  
                  </div> 
              </div>
              
          </div>

      </div>
      </div>
</div>

  




<!--Recently Viewed-->


<div class="home-buyone-get-one-recently-viewed">

<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-9 ad-img-home" >
      <a href="<?php echo url("/shop");?>"><img src="storage/app/public/images/buyone_ad.png"/></a>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-3">
  <div class="recommended-items-contents advanced-products-tab">
    <div class="row">
      <div class="col-12">
          <div class="content-title text-center">
              <h2>Recently viewed</h2>
          </div>
          <div class="slick-recommended-items">
              @foreach($advancedData['recommended_items'] as $key => $recommended_product)
              <div class="slick-items">
                  <div class="hover-product">
                      <div class="hover">
                          @if(!empty($recommended_product->image_url))
                          <a href ="{{ route('details-page', $recommended_product->slug) }}"><img class="d-block" src="{{ get_image_url( $recommended_product->image_url ) }}" alt="{{ basename( get_image_url( $recommended_product->image_url ) ) }}" /></a>
                          @else
                          <a href ="{{ route('details-page', $recommended_product->slug) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a>
                          @endif

                          <div class="overlay">
                              <button class="info quick-view-popup" data-id="{{ $recommended_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                          </div>
                      </div> 

                      <div class="single-product-bottom-section">
                          <h3><a href ="{{ route('details-page', $recommended_product->slug) }}">{!! $recommended_product->title !!}</a></h3>

                          @if( $recommended_product->type == 'simple_product' )
                          <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->price)), $selected_currency) !!}</p>
                          @elseif( $recommended_product->type == 'configurable_product' )
                          <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $recommended_product->id) !!}</p>
                          @elseif( $recommended_product->type == 'customizable_product' || $recommended_product->type == 'downloadable_product')
                          @if(count(get_product_variations($recommended_product->id))>0)
                          <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $recommended_product->id) !!}</p>
                          @else
                          <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->price)), $selected_currency) !!}</p>
                          @endif
                          @endif

                          <div class="title-divider"></div>
                          <div class="single-product-add-to-cart">
                              @if( $recommended_product->type == 'simple_product' )
                              <a href="" data-id="{{ $recommended_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                              <a href="{{ route('details-page', $recommended_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                              @elseif( $recommended_product->type == 'configurable_product' )
                              <a href="{{ route('details-page', $recommended_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>

                              <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                              <a href="{{ route('details-page', $recommended_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                              @elseif( $recommended_product->type == 'customizable_product' )
                              @if(is_design_enable_for_this_product($recommended_product->id))
                              <a href="{{ route('customize-page', $recommended_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>

                              <a href="" class="btn btn-sm btn-style  product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>

                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                              <a href="{{ route('details-page', $recommended_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->

                              @else
                              <a href="" data-id="{{ $recommended_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>

                              <a href="{{ route('details-page', $recommended_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                              @endif
                              @elseif( $recommended_product->type == 'downloadable_product' )  
                              @if(count(get_product_variations( $recommended_product->id ))>0)
                              <a href="{{ route( 'details-page', $recommended_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                              <a href="{{ route('details-page', $recommended_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                              @else
                              <a href="" data-id="{{ $recommended_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                              <!-- <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange" ></i></a>
                              <a href="{{ route('details-page', $recommended_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a> -->
                              @endif                 
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>      
    </div>      
  </div>
  </div>
</div>

</div>



<!--Recently Viewed-->












  
  
<!--Testimonial Section-->
  
  
  @if(count($testimonials_data) > 0)
  <div class="testimonials-slider">
      <div class="row">
        <div class="col-12">
          <div class="content-title text-center">
              <h2>{!! trans('frontend.testimonials_label') !!}</h2>
          </div>

          <div class="special-products-slider-control">
              <a href="#slider-carousel-testimonials" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
              </a>
              <a href="#slider-carousel-testimonials" data-slide="next">
                  <i class="fa fa-angle-right"></i>
              </a>
          </div>  

          <div id="slider-carousel-testimonials" class="carousel slide slider-carousel-testimonials" data-ride="carousel">
              <?php $numb = 0; ?>
              <div class="carousel-inner">
                  @foreach($testimonials_data as $row)
                  @if($numb == 0)
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-4 ml-auto">
                          <div class="testimonials-img text-right">
                              @if(!empty($row->testimonial_image_url))
                              <img src="{{ get_image_url($row->testimonial_image_url) }}" alt="" width="170" height="169">
                              @else
                              <img src="{{ default_placeholder_img_src() }}" alt="" width="170" height="169">
                              @endif
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-5 mr-auto">
                          <div class="testimonials-text">
                              <h2>{!! $row->post_title !!}</h2>
                              <!-- <p>{!! $row->created_at !!}</p> -->
                              <p>{!! get_limit_string( string_decode($row->post_content), 200 ) !!}</p>
                              <a href="{{ route('testimonial-single-page', $row->post_slug)}}" class="btn btn-sm testimonials-read">{!! trans('frontend.read_more_label') !!}</a>
                          </div>
                      </div>
                    </div>      
                  </div>
                  @else
                  <div class="carousel-item">
                    <div class="row">  
                      <div class="col-xs-12 col-sm-12 col-md-5 ml-auto">
                          <div class="testimonials-img text-right">
                              @if(!empty($row->testimonial_image_url))
                              <img src="{{ get_image_url($row->testimonial_image_url) }}" alt="" width="170" height="169">
                              @else
                              <img src="{{ default_placeholder_img_src() }}" alt="" width="170" height="169">
                              @endif
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-5 mr-auto">
                          <div class="testimonials-text">
                              <h2>{!! $row->post_title !!}</h2>
                              <!-- <p>{!! $row->created_at !!}</p> -->
                              <p>{!! get_limit_string(string_decode($row->post_content), 200) !!}</p>
                              <a href="{{ route('testimonial-single-page', $row->post_slug)}}" class="btn btn-sm testimonials-read">{!! trans('frontend.read_more_label') !!}</a>
                          </div>
                      </div>
                    </div>    
                  </div>
                  @endif
                  <?php $numb ++; ?>
                  @endforeach
              </div>
          </div>
        </div>      
      </div>
  </div>
  @endif  
  
<!--Testimonial Section-->



<!--Lastest Events-->

<div class="home-lastest-events-images">
<div class="row">
  <div class="col-12">
  <div class="content-title text-center">
              <h2>Latest Events</h2>
          </div>
  </div>
</div>
<?php $news_categories = $categoriesTree[1]['children'];?>

  <div class="row">
        <div class="col-sm-12 home-lastest-events-images-inner">
        
        @if(count($news_categories) > 0)

      @foreach($news_categories as $akey => $row)

                  <div class="slick-items active">
                    <div class="hover-product">
                    <img src="{{ get_image_url($row['img_url']) }}"/>
                    <div class="text-container" style="text-align: center;
    padding: 15px;">
                        <a href="<?php echo url("/categories/".$row['slug']);?>" style="font-size: 17px;
    color: #615353;
    font-weight: bold;"  >{!! $row['name'] !!}</a>
                      
                    </div>
                    </div>
                  </div>
       @endforeach

        @endif   
              
        </div>
  </div>
</div>

<!--Lastest Events-->







  <!-- Recent Blog -->
  @if(count($blogs_data) > 0)
  <!-- <div class="row">
    <div class="col-12">
      <div class="recent-blog">
          <div class="content-title text-center">
              <h2> <span>{!! trans('frontend.latest_from_the_blog') !!}</span></h2>
          </div>
          <div class="recent-blog-content">
            <div class="row">
              @foreach($blogs_data as $rows)
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4  blog-box pb-5">
                  <a href="{{ route('blog-single-page', $rows['post_slug'])}}">
                      @if(!empty($rows['blog_image']))
                      <img class="d-block" src="{{ get_image_url($rows['blog_image']) }}"  alt="{{basename( $rows['blog_image'] )}}">
                      @else
                      <img class="d-block" src="{{ default_placeholder_img_src() }}"  alt="no image">
                      @endif
                      <div class="blog-bottom-text">
                          <p class="blog-title">{{ $rows['post_title'] }}</p>
                          <p class="blog-date-comments"><span class="blog-date"><i class="fa fa-calendar"></i>&nbsp; {{ Carbon\Carbon::parse($rows['created_at'])->format('d F, Y') }}</span>&nbsp;&nbsp;<span class="blog-comments"> <i class="fa fa-comment"></i>&nbsp; {!! $rows['comments_details']['total'] !!} {!! trans('frontend.comments_label') !!}</span></p>
                      </div>
                  </a>
              </div>
              @endforeach
            </div>  
          </div>
      </div>
    </div>      
  </div>     -->
  @endif
    
  <!-- Recent Blog -->


  @if(count($brands_data) > 0)  
  <!-- <div class="brands-list">
      <div class="row">
          <div class="col-12">
              <div class="content-title text-center">
                  <h2> <span>{!! trans('frontend.brands') !!}</span></h2>
              </div>

              <div class="brands-list-content">
                  @foreach($brands_data as $brand)
                  <div class="brands-images">  
                      @if(!empty($brand->brand_logo_img_url))
                      <a href="{{ route('brands-single-page', $brand->slug) }}"><img  src="{{ get_image_url($brand->brand_logo_img_url) }}" alt="{{ basename($brand->brand_logo_img_url) }}" /></a>
                      @else
                      <a href="{{ route('brands-single-page', $brand->slug) }}"><img  src="{{ default_placeholder_img_src() }}" alt="" /></a>
                      @endif
                  </div>
                  @endforeach
              </div>  
          </div>      
      </div>      
  </div> -->
  @endif
  

  




</div>