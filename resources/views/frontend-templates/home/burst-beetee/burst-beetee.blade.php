<!-- Banner Section -->
<section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">
        <!-- Slide Item -->
        <div class="slide-item style-one">
            <div class="auto-container">
                <div class="image-outer"><div class="banner-image" style="background-image: url({{ URL::asset('public/burst-beetee/images/main-slider/1.png') }});"></div></div>
                <div class="content-box">
                    <h4>Caring in the times of</h4>
                    <h2><strong>COVID 19</strong> Boost your immunity</h2>
                    <div class="text">Boost your immunity with NT-Oxidant, Spirulina, Ayush Kwath.</div>
                    <a href="{{ url ("/product/categories/health-care")}}" class="theme-btn icon-btn-one"><span>Read More</span></a>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item style-two">
            <div class="auto-container">
                <div class="image-outer"><div class="banner-image" style="background-image: url({{ URL::asset('public/burst-beetee/images/main-slider/2.jpg') }});"></div></div>
                <div class="content-box">
                    <h4>Ceyone Nutri Makeup Products</h4>
                    <h2><strong>Rediscover</strong> Yourself With Ceyone</h2>
                    <div class="text">Ceyone Nutri India Private Limited is an excellent platform for self-determined professionals who seek to discover new highs</div>
                    <a href="{{url ("/product/categories/oral-care")}}" class="theme-btn icon-btn-one"><span>Read More</span></a>
                </div>
            </div>
        </div>

        <!-- Slide Item three
        <div class="slide-item style-three"> -->
        <div class="slide-item style-two">
            <div class="image-outer"><div class="banner-image" style="background-image: url({{ URL::asset('public/burst-beetee/images/main-slider/3.jpg') }});"></div></div>
            <div class="auto-container">
                <div class="content-box">
                    <h4>With Ceyone Always be</h4>
                    <h2><strong>The One</strong> You Are</h2>
                    <a href="{{url ("/product/categories/personal-care")}}" class="theme-btn icon-btn-one"><span>Read More</span></a>
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
                    <h4><a href="javascript:;">NATIONWIDE SERVICE</a></h4>
                    <p>The ultimate care</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-support-2"></span>
                    <h4><a href="javascript:;">24/7 HELP CENTRE</a></h4>
                    <p>At your Service</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-reload-1"></span>
                    <h4><a href="javascript:;">SAFE PAYMENT</a></h4>
                    <p>Make hassle free Payment</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-gift"></span>
                    <h4><a href="javascript:;">QUICK DELIVERY</a></h4>
                    <p>Get at your doorstep</p>
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
                                    <a href="" class="product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><span class="icon flaticon-heart"></span></a>
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
                                <div class="time-countdown" data-countdown="06/06/2022"></div>
                                <div class="info">
                                    <h4 class="name">ALWAYS 21 FACE WASH ( 60 ML)</h4>
                                    <span class="price"><del>Rs.400</del>Rs.290</span>
                                </div>
                            </div>

                            <div class="image-box">
                                <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/hot-product.png') }}" alt=""></figure>
                                <div class="sale-tag">Sale <span>30% OFF</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="{{url ("/product/categories/health-care")}}" class="theme-btn icon-btn-one"><span>View All</span></a>
        </div>
    </div>
</section>
<!-- End Upcoming Product -->

<!-- Call to Action -->
<section class="call-to-action" style="background-image: url({{ URL::asset('public/burst-beetee/images/background/1.jpg') }});">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>CLEAN ORGANIC AND NATURAL <br>SKIN CARE PRODUCTS</h2>
            <div class="text"> Ceyone Nutri India Private Limited is an excellent platform for self-determined professionals who seek to discover new highs in entrepreneurial ventures for a more meaningful life. Our business plan not only transforms your life physically and financially, but also touches those around you.</div>
            <a href="{{url ("/product/categories/personal-care")}}" class="theme-btn icon-btn-one"><span>Shop Now</span></a>
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
                    {{-- <li class="filter" data-role="button" data-filter=".recommended_items">Recommended for you</li>
                    <li class="filter" data-role="button" data-filter=".features_items">Featured Products</li>
                    <li class="filter" data-role="button" data-filter=".best_sales">Best Sales</li>
                    <li class="filter" data-role="button" data-filter=".todays_deal">Todays Deal</li> --}}
                </ul>
            </div>
            <div class="filter-list row">
                @foreach($advancedData['latest_items'] as $key => $latest_product)
                <!-- Product Block --> 
                <div class="product-block all mix {{ Str::kebab($latest_product->categories) }} col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">                            
                            @if(!empty($latest_product->image_url))
                            <figure class="image"><a href ="{{ route('details-page', $latest_product->slug) }}"><img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" /></a></figure>
                            @else
                            <figure class="image"><a href ="{{ route('details-page', $latest_product->slug) }}"><img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a></figure>
                            @endif
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="" class="product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><span class="icon flaticon-heart"></span></a>
                                    
                                    <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><span class="icon flaticon-shopping-cart"></span></a>
                                    {{-- <a href="shop-single.html"><span class="icon flaticon-paper-clip"></span></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="lower-content clearfix">
                            <span class="cat">{!! $latest_product->categories !!}</span>
                            <h4 class="name"><a href ="{{ route('details-page', $latest_product->slug) }}">{!! $latest_product->title !!}</a></h4>
                            <span class="price">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Baners Area -->
        <div class="banners-area row">
            <!-- Banner Box -->
            <div class="banner-box col-lg-8 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="{{ URL("/product/categories/oral-care") }}"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-1.png') }}" alt=""></a></figure>
            </div>

            <!-- Banner Box -->
            <div class="banner-box col-lg-4 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="{{ URL("/product/categories/personal-care") }}"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-2.png') }}" alt=""></a></figure>
            </div>

            <!-- Banner Box -->
            <div class="banner-box col-lg-6 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="{{ URL("/product/categories/health-care") }}"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-3.png') }}" alt=""></a></figure>
            </div>

            <!-- Banner Box -->
            <div class="banner-box col-lg-6 col-md-12 col-sm-12">
                <figure class="banner-img"><a href="{{ URL("/product/categories/agri-care") }}"><img src="{{ URL::asset('public/burst-beetee/images/resource/banner-4.png') }}" alt=""></a></figure>
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
                        <h2>Look more Beautiful <br><span>Personal Care</span><br> With Ceyoune</h2>
                        <div class="text"> Your skin deserves a routine as unique as you are. That’s why we’re always chatting with skin care experts and looking into the latest products, treatments and tips to help you create your perfect skin care routine.</div>
                        <a href="{{url ("/product/categories/personal-care")}}" class="theme-btn icon-btn-one"><span>Products</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-column col-lg-6 col-md-12">
            <div class="content-box" style="background-image: url({{ URL::asset('public/burst-beetee/images/resource/image-2.jpg') }});">
                <div class="inner-box">
                    <div class="sec-title">
                        <h2>Stay Healthy With<br><span>Agri Care</span><br> Organic products</h2>
                        <div class="text"> Farmers care about sustainability, regardless of label, not just because it is the right thing to do, but also because our livelihoods are dependent on the land, water, and air.You can keep cultivating the same piece of land for decades or centuries. </div>
                        <a href="{{url ("/product/categories/agri-care")}}" class="theme-btn icon-btn-one"><span>Products</span></a>
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
            <span class="title">Recent Updates</span>
            <h2>Our Latest Events</h2>
        </div>
        <?php $news_categories = $categoriesTree[1]['children'];?>
        <div class="row">
            <?php $i = 0; ?>
            @foreach($news_categories as $key => $row)

            <?php if($i >= 3) { break; }else{ ?>
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ get_image_url($row['img_url']) }}" alt="" /></figure>
                        <a href="blog-single.html" class="overlay-link"></a>
                    </div>
                    <div class="lower-content">
                        <h3><a href="<?php echo url("/categories/".$row['slug']);?>">{!! $row['name'] !!}</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">{!! $row['created_at']!!}</a></li>
                        </ul>
                        <a href="<?php echo url("/categories/".$row['slug']);?>" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <?php $i++; } ?>
            @endforeach

            <!-- News Block End-->
   
        </div>
    </div>
</section>
<!-- End News Section -->

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="title">Clients Love Us</span>
            <h2>{!! trans('frontend.testimonials_label') !!}</h2>
        </div>

        <div class="row">
            <div class="carousel-column col-lg-8 col-md-12 col-sm-12">
                <div class="carousel-outer">
                    <!-- Testimonial Carousel -->
                    <div class="testimonial-carousel owl-carousel owl-theme">
                        @foreach($testimonials_data as $row)
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <figure class="image-box">
                                @if(!empty($row->testimonial_image_url))
                                    <img src="{{ get_image_url($row->testimonial_image_url) }}" alt="">
                                @else
                                    <img src="{{ default_placeholder_img_src() }}" alt="">
                                @endif
                            </figure>
                            <!-- Text Box -->
                            <div class="text-box">
                                <div class="inner-box">
                                    
                                    <span class="icon flaticon-quote-1"></span>
                                    <p>{!! get_limit_string( string_decode($row->post_content), 200 ) !!}</p>
                                    <div class="info-box">
                                        <h5 class="name">{!! $row->testimonial_client_name !!}</h5>
                                        <span class="designation">Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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