<!-- Banner Section -->
<section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">
        <!-- Slide Item -->
        <div class="slide-item style-one">
            <div class="auto-container">
                <div class="image-outer"><div class="banner-image" style="background-image: url({{ URL::asset('public/burst-beetee/images/main-slider/1.png') }});"></div></div>
                <div class="content-box">
                    <h4>Burst BeeTee Makeup Products</h4>
                    <h2><strong>We Don't</strong> Just Sell Makeup</h2>
                    <div class="text">Nam purus diam, efficitur at velit et, hendrerit dapibus magna. Donec in metus nisl. Curabitur non molestie ante.</div>
                    <a href="services.html" class="theme-btn icon-btn-one"><span>Read More</span></a>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item style-two">
            <div class="auto-container">
                <div class="image-outer"><div class="banner-image" style="background-image: url({{ URL::asset('public/burst-beetee/images/main-slider/2.jpg') }});"></div></div>
                <div class="content-box">
                    <h4>Burst BeeTee Makeup Products</h4>
                    <h2><strong>A Website</strong> Makes it real</h2>
                    <div class="text">Nam purus diam, efficitur at velit et, hendrerit dapibus magna. Donec in metus nisl. Curabitur non molestie ante.</div>
                    <a href="services.html" class="theme-btn icon-btn-one"><span>Read More</span></a>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item style-three">
            <div class="image-outer"><div class="banner-image" style="background-image: url({{ URL::asset('public/burst-beetee/images/main-slider/3.jpg') }});"></div></div>
            <div class="auto-container">
                <div class="content-box">
                    <h4>Burst BeeTee Makeup Products</h4>
                    <h2><strong>Makeup</strong> Is an Art</h2>
                    <a href="services.html" class="theme-btn icon-btn-one"><span>Read More</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END Banner Section -->

<!-- Top Features -->
<section class="top-features">
    <div class="auto-container">
        <div class="row">
            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-air-freight"></span>
                    <h4><a href="#">Worldwide Shipping</a></h4>
                    <p>Lorem ipsum dolor sit</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-support-2"></span>
                    <h4><a href="#">Customer Support 24/7</a></h4>
                    <p>Suspendisse ac lacus odio</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-reload-1"></span>
                    <h4><a href="#">Free Returns</a></h4>
                    <p>Aliquam mollis purus in es</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-gift"></span>
                    <h4><a href="#">Gift Vouchers</a></h4>
                    <p>Cras a nunc id risus</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Section -->

<!-- Products Section -->
<section class="products-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="title">Special Offers</span>
            <h2>Featured Products</h2>
        </div>

        <div class="carousel-outer">
            <!-- Products Carousel -->
            <div class="products-carousel owl-carousel owl-theme">
                @foreach($advancedData['features_items'] as $key => $features_product)
                <!-- Product Block --> 
                <div class="product-block">
                    <div class="inner-box">
                        <div class="image-box">
                            @if(!empty($features_product->image_url))
                            <figure class="image"><a href ="{{ route('details-page', $features_product->slug) }}"><img class="d-block" src="{{ get_image_url( $features_product->image_url ) }}" alt="{{ basename( get_image_url( $features_product->image_url ) ) }}" /></a></figure>
                            @else
                            <figure class="image"><a href ="{{ route('details-page', $features_product->slug) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a></figure>
                            @endif
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="#"><span class="icon flaticon-heart"></span></a>
                                    <a href="#" class="add-to-cart-bg" data-id="{{ $features_product->id }}" ><span class="icon flaticon-shopping-cart"></span></a>
                                    {{-- <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <h4 class="name"><a href="shop-single.html">{!! $features_product->title !!}</a></h4>
                            <span class="price"><del>${{ $features_product->regular_price }}</del> ${{ $features_product->price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Product Block --> 
                <div class="product-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/2.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <h4 class="name"><a href="shop-single.html">Consectetur Adipiscing Elit</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/3.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <h4 class="name"><a href="shop-single.html">Nulla Facilisi Praesent</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/1.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <h4 class="name"><a href="shop-single.html">Desodorante Para Mujer</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/2.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <h4 class="name"><a href="shop-single.html">Desodorante Para Mujer</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/3.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <h4 class="name"><a href="shop-single.html">Desodorante Para Mujer</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Products Section End -->

<!-- Upcoming Product -->
<section class="upcoming-product">
    <div class="auto-container">
        <div class="row">
            <div class="features-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    
                    <!-- Feature Block -->
                    <div class="feature-block-two">
                        <span class="icon flaticon-tea"></span>
                        <h4>Natural Extracts</h4>
                        <div class="text">Natural colors, functionality and nutritional substances.</div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block-two">
                        <span class="icon flaticon-security"></span>
                        <h4>Quality Assurance</h4>
                        <div class="text">Each product are certified by our quality control.</div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block-two">
                        <span class="icon flaticon-matcha"></span>
                        <h4>Perfect Blend</h4>
                        <div class="text">Natural Aloe Vera, honey, papaya, pulp, argan oil..</div>
                    </div>
                </div>
            </div>

            <div class="product-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="hot-product">
                        <h3 class="title">Hot Product</h3>
                        <div class="content">
                            <div class="time-counter">
                                <div class="time-countdown" data-countdown="12/12/2020"></div>
                                <div class="info">
                                    <h4 class="name">Desodorante Para </h4>
                                    <span class="price"><del>$30.00</del> $24.00</span>
                                </div>
                            </div>

                            <div class="image-box">
                                <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/hot-product.png') }}" alt=""></figure>
                                <div class="sale-tag">Sale <span>50% OFF</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="shop.html" class="theme-btn icon-btn-one"><span>View All</span></a>
        </div>
    </div>
</section>
<!-- End Upcoming Product -->

<!-- Call to Action -->
<section class="call-to-action" style="background-image: url({{ URL::asset('public/burst-beetee/images/background/1.jpg') }});">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>CLEAN ORGANIC AND NATURAL <br>COSMETIC PRODUCTS</h2>
            <div class="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in aliquet nisl. Sed quis lorem condimentum, mattis nulla a, maximus diam. Phasellus non justo vitae est placerat dictum faucibus quis elit.Nam fringilla sodales arcu ullamcorper tincidunt.</div>
            <a href="shop.html" class="theme-btn icon-btn-one"><span>Products</span></a>
        </div>
    </div>
</section>
<!-- End Call to Action -->

<!-- Products Section -->
<section class="products-section-two">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="title">Just in to store</span>
            <h2>New Products</h2>
        </div>

        <!--MixitUp Galery-->
        <div class="mixitup-gallery">
            <!--Filter-->
            <div class="filters clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all">All</li>
                    @foreach($advancedData['categories'] as $key => $category)
                    <li class="filter" data-role="button" data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                    @endforeach
                    {{-- <li class="filter" data-role="button" data-filter=".baby-prod">Baby Products</li>
                    <li class="filter" data-role="button" data-filter=".bath-prep">Bath Preparations</li>
                    <li class="filter" data-role="button" data-filter=".eye-makeup">Eye Makeup</li>
                    <li class="filter" data-role="button" data-filter=".fragrance">Fragrance</li>
                    <li class="filter" data-role="button" data-filter=".hair-prep">Hair Preparations</li> --}}
                </ul>
            </div>
                                                                            
            <div class="filter-list row">
                @foreach($advancedData['features_items'] as $key => $features_product)
                <!-- Product Block --> 
                <div class="product-block all mix bath-prep col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">                            
                            @if(!empty($features_product->image_url))
                            <figure class="image"><a href ="{{ route('details-page', $features_product->slug) }}"><img class="d-block" src="{{ get_image_url( $features_product->image_url ) }}" alt="{{ basename( get_image_url( $features_product->image_url ) ) }}" /></a></figure>
                            @else
                            <figure class="image"><a href ="{{ route('details-page', $features_product->slug) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a></figure>
                            @endif
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="" data-id="{{ $features_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><span class="icon flaticon-shopping-cart"></span></a>
                                    {{-- <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">{!! $features_product->type !!}</span>
                            <h4 class="name"><a href ="{{ route('details-page', $features_product->slug) }}">{!! $features_product->title !!}</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>
                @endforeach
                
                {{-- <!-- Product Block --> 
                <div class="product-block all mix bath-prep col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/1.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Baby Products</span>
                            <h4 class="name"><a href="shop-single.html">Turpis Faucibus Tempor</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block all mix baby-prod bath-prep col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/2.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Bath Preparations</span>
                            <h4 class="name"><a href="shop-single.html">Vestibulum Interdum</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block all mix baby-prod col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/3.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Baby Products</span>
                            <h4 class="name"><a href="shop-single.html">Eleifend Fringilla</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block all mix baby-prod col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/4.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Baby Products</span>
                            <h4 class="name"><a href="shop-single.html">Tristique Senectus Et</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block all mix fragrance hair-prep bath-prep col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/5.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Hair Preparations</span>
                            <h4 class="name"><a href="shop-single.html">Curabitur Sed Metus</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block all mix eye-makeup hair-prep col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/6.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Eye Makeup</span>
                            <h4 class="name"><a href="shop-single.html">Venenatis Eu Eget</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block all mix fragrance col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/7.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Fragrance</span>
                            <h4 class="name"><a href="shop-single.html">Nulla Porta Urna</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block --> 
                <div class="product-block all mix eye-makeup hair-prep col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/products/8.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="wishlist.html"><span class="icon flaticon-heart"></span></a>
                                    <a href="shopping-cart.html"><span class="icon flaticon-shopping-cart"></span></a>
                                    <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">Hair Preparations</span>
                            <h4 class="name"><a href="shop-single.html">Desodorante Para Mujer</a></h4>
                            <span class="price"><del>$30.00</del> $24.00</span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <!-- Baners Area -->
        <div class="banners-area row">
            <!-- Banner Box -->
            <div class="banner-box col-lg-8 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="shop-single.html"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-1.png') }}" alt=""></a></figure>
            </div>

            <!-- Banner Box -->
            <div class="banner-box col-lg-4 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="shop-single.html"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-2.png') }}" alt=""></a></figure>
            </div>

            <!-- Banner Box -->
            <div class="banner-box col-lg-6 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="shop-single.html"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-3.png') }}" alt=""></a></figure>
            </div>

            <!-- Banner Box -->
            <div class="banner-box col-lg-6 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="shop-single.html"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-4.png') }}" alt=""></a></figure>
            </div>
        </div>
    </div>
</section>
<!-- End Products Section -->

<!-- Fluid Sectin -->
<section class="fluid-section">
    <div class="row no-gutters">
        <div class="left-column col-lg-6 col-md-12">
            <!-- Image Column -->
            <div class="image-box" style="background-image: url({{ URL::asset('public/burst-beetee/images/resource/image-1.jpg') }});">
                <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/image-1.jpg') }}" alt=""></figure>
            </div>

            <div class="content-box">
                <div class="inner-box">
                    <div class="sec-title">
                        <h2>Lorem ipsum dolor <br><span>consectetur</span><br> Sed non leo laore</h2>
                        <div class="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in aliquet nisl. Sed quis lorem condimentum, mattis nulla a, maximus diam. Phasellus non justo vitae est placerat dictum faucibus quis elit.</div>
                        <a href="shop.html" class="theme-btn icon-btn-one"><span>Products</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-column col-lg-6 col-md-12">
            <div class="content-box" style="background-image: url({{ URL::asset('public/burst-beetee/images/resource/image-2.jpg') }});">
                <div class="inner-box">
                    <div class="sec-title">
                        <h2>Lorem ipsum dolor <br><span>consectetur</span><br> Sed non leo laore</h2>
                        <div class="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in aliquet nisl. Sed quis lorem condimentum, mattis nulla a, maximus diam. Phasellus non justo vitae est placerat dictum faucibus quis elit.</div>
                        <a href="shop.html" class="theme-btn icon-btn-one"><span>Products</span></a>
                    </div>
                </div>
            </div>
            <!-- Image Column -->
            <div class="image-box" style="background-image: url({{ URL::asset('public/burst-beetee/images/resource/image-1-1.jpg') }});">
                <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/image-1-1.jpg') }}" alt=""></figure>
            </div>

        </div>
    </div>
</section>
<!-- End Fluid Sectin -->

<!-- News Section -->
<section class="news-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="title">News Update</span>
            <h2>Our Latest Blogs</h2>
        </div>

        <div class="row">
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/news-1.jpg') }}" alt="" /></figure>
                        <a href="blog-single.html" class="overlay-link"></a>
                    </div>
                    <div class="lower-content">
                        <span class="cat">Information</span>
                        <h3><a href="blog-single.html">Organic and Natural What’s the Difference?</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">26 August 2020</a></li>
                            <li><a href="#">By Thomas Jones</a></li>
                        </ul>
                        <div class="text">Sed venenatis ut sem id molestie. Pellentes que habitant morbi tristique senectus et ne tus et malesuada. </div>
                        <a href="blog-single.html" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>

            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/news-2.jpg') }}" alt="" /></figure>
                        <a href="blog-single.html" class="overlay-link"></a>
                    </div>
                    <div class="lower-content">
                        <span class="cat">Information</span>
                        <h3><a href="blog-single.html">Most Popular Questions Eyelash Extension?</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">26 August 2020</a></li>
                            <li><a href="#">By Thomas Jones</a></li>
                        </ul>
                        <div class="text">Sed venenatis ut sem id molestie. Pellentes que habitant morbi tristique senectus et ne tus et malesuada. </div>
                        <a href="blog-single.html" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>

            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/news-3.jpg') }}" alt="" /></figure>
                        <a href="blog-single.html" class="overlay-link"></a>
                    </div>
                    <div class="lower-content">
                        <span class="cat">Information</span>
                        <h3><a href="blog-single.html">What to Consider When Eyelash Extensions?</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">26 August 2020</a></li>
                            <li><a href="#">By Thomas Jones</a></li>
                        </ul>
                        <div class="text">Sed venenatis ut sem id molestie. Pellentes que habitant morbi tristique senectus et ne tus et malesuada. </div>
                        <a href="blog-single.html" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End News Section -->

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="title">Clients Love Us</span>
            <h2>Our Testimonials</h2>
        </div>

        <div class="row">
            <div class="carousel-column col-lg-8 col-md-12 col-sm-12">
                <div class="carousel-outer">
                    <!-- Testimonial Carousel -->
                    <div class="testimonial-carousel owl-carousel owl-theme">
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <figure class="image-box"><img src="{{ URL::asset('public/burst-beetee/images/resource/avatar-1.jpg') }}" alt=""></figure>
                            <!-- Text Box -->
                            <div class="text-box">
                                <div class="inner-box">
                                    <span class="icon flaticon-quote-1"></span>
                                    <p>"Maecenas tellus magna, gravida a porttitor a, ultrices eget ipsum. Nulla porta urna in tortor volutpat aliquet. Quisque eget massa interdum, commodo nisl eget, fringilla ligula "</p>
                                    <div class="info-box">
                                        <h5 class="name">John Doe</h5>
                                        <span class="designation">Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <figure class="image-box"><img src="{{ URL::asset('public/burst-beetee/images/resource/avatar-1.jpg') }}" alt=""></figure>
                            <!-- Text Box -->
                            <div class="text-box">
                                <div class="inner-box">
                                    <span class="icon flaticon-quote-1"></span>
                                    <p>"Maecenas tellus magna, gravida a porttitor a, ultrices eget ipsum. Nulla porta urna in tortor volutpat aliquet. Quisque eget massa interdum, commodo nisl eget, fringilla ligula "</p>
                                    <div class="info-box">
                                        <h5 class="name">John Doe</h5>
                                        <span class="designation">Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-column col-lg-4 col-md-12 col-sm-12">
                 <!-- Newslatters-->
                <div class="newslatters">
                    <h3>Subscribe Now</h3>
                    <form method="post" action="blog-sidebar.html">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name" required="">
                            <span class="icon flaticon-user-1"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="Email" placeholder="Email" required="">
                            <span class="icon flaticon-email-4"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn icon-btn-one"><span class="btn-title">Subscribe</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->