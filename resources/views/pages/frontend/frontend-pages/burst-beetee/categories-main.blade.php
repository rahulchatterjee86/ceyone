@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_category_products') .' < '. get_site_title() )
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{ URL::asset('public/burst-beetee/images/background/5.jpg') }});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Shop Left Sidebar</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('shop-page') }}">Products</a></li>
                <li>Shop Grid</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Sidebar Page Container -->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="shop-upper-box">
            <div class="items-label">Showing Result of “{{ count($product_by_cat_id['products']) }}” Products</div>
            <div class="sort-by">
                {{-- <select class="custom-select-box" id="grid-view">
                    <option>3 Column</option>
                    <option>4 column</option>
                    <option>List view</option>
                    <option>Grid view</option>
                </select> --}}

                {{-- <select class="custom-select-box" id="latest-item">
                    <option>Latest Items</option>
                    <option>Oldest Items</option>
                    <option>Price Lowest</option>
                    <option>Price Highest</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select> --}}

                {{-- <select class="custom-select-box" id="sort-by-price">
                    <option>Sort by Price</option>
                    <option>Price: Lowest First</option>
                    <option>Price: Highest First</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select> --}}

                <span>{{ trans('frontend.sort_filter_label') }} </span>
                <select class="select2 sort-by-filter custom-select-box" style="width: 50%;">
                    @if($product_by_cat_id['sort_by'] == 'all')
                        <option selected="selected" value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                    @else
                        <option value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                    @endif

                    @if($product_by_cat_id['sort_by'] == 'alpaz')
                        <option selected="selected" value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                    @else
                        <option value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                    @endif

                    @if($product_by_cat_id['sort_by'] == 'alpza')
                        <option selected="selected" value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                    @else
                        <option value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                    @endif

                    @if($product_by_cat_id['sort_by'] == 'low-high')
                        <option selected="selected" value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                    @else
                        <option value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                    @endif

                    @if($product_by_cat_id['sort_by'] == 'high-low')
                        <option selected="selected" value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                    @else
                        <option value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                    @endif

                    @if($product_by_cat_id['sort_by'] == 'old-new')
                        <option selected="selected" value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                    @else
                        <option value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                    @endif

                    @if($product_by_cat_id['sort_by'] == 'new-old')
                        <option selected="selected" value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                    @else
                        <option value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                <div class="row">
                    @foreach($product_by_cat_id['products'] as $products)
                    <!-- Product Block --> 
                    <div class="product-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                @if(get_product_image($products['id']))
                                <figure class="image"><a href ="{{ route('details-page', $products['slug']) }}"><img class="d-block" src="{{ get_image_url(get_product_image($products['id'])) }}" alt="{{ basename(get_product_image($products['id'])) }}" /></a></figure>
                                @else
                                <figure class="image"><a href ="{{ route('details-page', $products['slug']) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a></figure>
                                @endif
                                <div class="overlay-box">
                                    <div class="btn-box">
                                        <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                        <a href="" data-id="{{ $products['id'] }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><span class="icon flaticon-shopping-cart"></span></a>
                                        {{-- <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content clearfix">
                                <h4 class="name"><a href="{{ route('details-page', $products['slug']) }}">{!! get_product_title($products['id']) !!}</a></h4>
                                <span class="price">
                                    {{-- <del>$30.00</del>  --}}
                                    @if(get_product_type($products['id']) == 'simple_product')
                                        <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['price'])), get_frontend_selected_currency()) !!}</p>
                                    @elseif(get_product_type($products['id']) == 'configurable_product')
                                        <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}</p>
                                    @elseif(get_product_type($products['id']) == 'customizable_product' || get_product_type($products['id']) == 'downloadable_product')
                                        @if(count(get_product_variations($products['id']))>0)
                                        <p>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}</p>
                                        @else
                                        <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['price'])), get_frontend_selected_currency()) !!}</p>
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!--Styled Pagination-->
                {!! $product_by_cat_id['products']->appends(Request::capture()->except('page'))->render() !!}
                <!--End Styled Pagination-->
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">

                    <!-- Categories -->
                    <div class="sidebar-widget categories">
                        <div class="sidebar-title"><h3>Categories</h3></div>
                        @foreach ($productCategoriesTree as $data)
                            @include('pages.common.category-frontend-loop', $data)
                        @endforeach
                    </div>

                    <form action="{{ $product_by_cat_id['action_url'] }}" method="get">
                        <div class="price-filter">
                            <h2>{{ trans('frontend.price_range_label') }} <span class="responsive-accordian"></span></h2>
                            <div class="price-slider-option">
                                <input type="text" class="span2" value="" data-slider-min="{{ get_appearance_settings()['general']['filter_price_min'] }}" data-slider-max="{{ get_appearance_settings()['general']['filter_price_max'] }}" data-slider-step="5" data-slider-value="[{{ $product_by_cat_id['min_price'] }},{{ $product_by_cat_id['max_price'] }}]" id="price_range"><br />
                                <b>{!! price_html(get_appearance_settings()['general']['filter_price_min'], get_frontend_selected_currency()) !!}</b> <b class="pull-right">{!! price_html(get_appearance_settings()['general']['filter_price_max'], get_frontend_selected_currency()) !!}</b>
                            </div>
                    
                            <input name="price_min" id="price_min" value="{{ $product_by_cat_id['min_price'] }}" type="hidden">
                            <input name="price_max" id="price_max" value="{{ $product_by_cat_id['max_price'] }}" type="hidden">
                    
                            <div class="btn-filter clearfix">
                                <button class="btn btn-sm" type="submit">
                                    <!-- <i class="fa fa-filter" aria-hidden="true"></i>  -->
                                    Apply
                                    <!-- {{ trans('frontend.filter_label') }} -->
                                </button>
                                <!-- <a class="btn btn-sm" href="{{ route('shop-page') }}"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('frontend.clear_filter_label') }}</a>   -->
                            </div>
                        </div>
                    
                        @if(count($colors_list_data) > 0)
                            <div class="colors-filter">
                                <h2>{{ trans('frontend.choose_color_label') }} <span class="responsive-accordian"></span></h2>
                                <div class="colors-filter-option">
                                    @foreach($colors_list_data as $terms)
                                        <div class="colors-filter-elements">
                                            <div class="chk-filter">
                                                @if(count($product_by_cat_id['selected_colors']) > 0 && in_array($terms->slug, $product_by_cat_id['selected_colors']))
                                                    <input type="checkbox" checked class="shopist-iCheck chk-colors-filter" value="{{ $terms->slug }}">
                                                @else
                                                    <input type="checkbox" class="shopist-iCheck chk-colors-filter" value="{{ $terms->slug }}">
                                                @endif
                                            </div>
                                            <div class="filter-terms">
                                                <div class="filter-terms-appearance"><span style="background-color:#{{ $terms->color_code }};width:21px;height:20px;display:block;"></span></div>
                                                <div class="filter-terms-name">&nbsp; {!! $terms->name !!}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if($product_by_cat_id['selected_colors_hf'])
                                    <input name="selected_colors" id="selected_colors" value="{{ $product_by_cat_id['selected_colors_hf'] }}" type="hidden">
                                @endif
                            </div>
                        @endif
                    
                        @if(count($sizes_list_data) > 0)
                            <div class="size-filter">
                                <h2>{{ trans('frontend.choose_size_label') }} <span class="responsive-accordian"></span></h2>
                                <div class="size-filter-option">
                                    @foreach($sizes_list_data as $terms)
                                        <div class="size-filter-elements">
                                            <div class="chk-filter">
                                                @if(count($product_by_cat_id['selected_sizes']) > 0 && in_array($terms->slug, $product_by_cat_id['selected_sizes']))
                                                    <input type="checkbox" checked class="shopist-iCheck chk-size-filter" value="{{ $terms->slug }}">
                                                @else
                                                    <input type="checkbox" class="shopist-iCheck chk-size-filter" value="{{ $terms->slug }}">
                                                @endif
                                            </div>
                                            <div class="filter-terms">
                                                <div class="filter-terms-name">{!! $terms->name !!}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if($product_by_cat_id['selected_sizes_hf'])
                                    <input name="selected_sizes" id="selected_sizes" value="{{ $product_by_cat_id['selected_sizes_hf'] }}" type="hidden">
                                @endif
                            </div>
                        @endif
                    </form>

                    <!-- Popular Products -->
                    {{-- <div class="sidebar-widget popular-products">
                        <div class="sidebar-title"><h3>POPULAR PRODUCTS</h3></div>
                        <div class="widget-content">
                            <!-- Popular Product -->
                            <div class="popular-product">
                                <div class="product-thumb"><a href="blog-single.html"><img src="images/resource/products/p-thumb-1.png" alt=""></a></div>
                                <h5><a href="shop-single.html">Desodorante Para Mu Kmjhty Lkoiu</a></h5>
                                <div class="product-price"><del>$26.49</del> $22.49</div>
                            </div>

                            <!-- Popular Product -->
                            <div class="popular-product">
                                <div class="product-thumb"><a href="blog-single.html"><img src="images/resource/products/p-thumb-2.png" alt=""></a></div>
                                <h5><a href="shop-single.html">Desodorante Para Mu Kmjhty Lkoiu</a></h5>
                                <div class="product-price"><del>$26.49</del> $22.49</div>
                            </div>

                            <!-- Popular Product -->
                            <div class="popular-product">
                                <div class="product-thumb"><a href="blog-single.html"><img src="images/resource/products/p-thumb-3.png" alt=""></a></div>
                                <h5><a href="shop-single.html">Desodorante Para Mu Kmjhty Lkoiu</a></h5>
                                <div class="product-price"><del>$26.49</del> $22.49</div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Tags -->
                    {{-- <div class="sidebar-widget tags">
                        <div class="sidebar-title"><h3>POPULAR Tags</h3></div>
                        <ul class="popular-tags">
                            <li><a href="#">Cream</a></li>
                            <li><a href="#">Skin</a></li>
                            <li><a href="#">Almond</a></li>
                            <li><a href="#">Extract</a></li>
                            <li><a href="#">Face</a></li>
                            <li><a href="#">Mask</a></li>
                            <li><a href="#">Shapping</a></li>
                        </ul>
                    </div> --}}
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Container -->
@endsection

@section('scripts')
<script src="{{ URL::asset('public/burst-beetee/js/jquery-ui.js') }}"></script>
@endsection