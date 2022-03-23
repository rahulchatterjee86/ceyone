<!-- Shop Single  -->
<section class="shop-single">
    <div class="auto-container">
        <!-- Product Detail -->
        <div class="product-details">
            <!--Basic Details-->
            <div class="basic-details">
                <div class="row">
                    <div class="image-column col-lg-6 col-md-12">
                        @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)
                        @php $count = 1 @endphp
                        <div class="carousel-outer">
                            <ul class="image-carousel owl-carousel owl-theme">
                                @foreach($single_product_details['_product_related_images_url']->product_gallery_images as $key => $row)
                                @if($count == 1)
                                @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                                <li><a href="{{ get_image_url($row->url) }}" class="lightbox-image" title="Image Caption Here"><img src="{{ get_image_url($row->url) }}" alt=""></a></li>
                                @else
                                <li><a href="{{ default_placeholder_img_src() }}" class="lightbox-image" title="Image Caption Here"><img src="{{ default_placeholder_img_src() }}" alt=""></a></li>
                                @endif
                                @endif
                                <?php $count ++;?>
                                @endforeach
                            </ul>
                            <div class="thumbs-carousel-outer">
                                <ul class="thumbs-carousel owl-carousel owl-theme">
                                    @foreach($single_product_details['_product_related_images_url']->product_gallery_images as $key => $row)
                                    @if($count == 1)
                                    @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                                    <li><img src="{{ get_image_url($row->url) }}" alt=""></li>
                                    @else
                                    <li><img src="{{ default_placeholder_img_src() }}" alt=""></li>
                                    @endif
                                    @endif
                                    <?php $count ++;?>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="info-column col-lg-6 col-md-12">
                        <div class="details-header">
                            <h4>{{ $single_product_details['post_title'] }}</h4>
                            {{-- <div class="text">ST London’s Sensual Lips is an ultra-long lasting and smudge proof liquid lip color that keeps the lips nourished and smooth.</div> --}}
                            <div class="item-price">
                                @if( get_product_type($single_product_details['id']) == 'simple_product' || (get_product_type($single_product_details['id']) == 'downloadable_product' && count(get_product_variations($single_product_details['id'])) == 0 ) || (get_product_type($single_product_details['id']) == 'customizable_product' && count(get_product_variations($single_product_details['id'])) == 0 ) )
                                    @if(!is_null($single_product_details['offer_price']))
                                        <span class="offer-price">{!! price_html( $single_product_details['offer_price'] ) !!}</span>
                                    @endif

                                    <span class="solid-price">{!! price_html( $single_product_details['solid_price'] ) !!}</span>

                                    @if($single_product_details['post_regular_price'] && $single_product_details['post_sale_price'] && $single_product_details['post_regular_price'] > $single_product_details['post_sale_price'] && $single_product_details['_product_sale_price_start_date'] && $single_product_details['_product_sale_price_end_date'] && $single_product_details['_product_sale_price_end_date'] >= date("Y-m-d"))
                                        <p class="offer-message-label"><i class="fa fa-bell" aria-hidden="true"></i> {{ trans('frontend.offer_msg') }} <i>{!! date("F j, Y", strtotime($single_product_details['_product_sale_price_start_date'])) !!} {{ trans('frontend.to') }} {!! date("F j, Y", strtotime($single_product_details['_product_sale_price_end_date'])) !!} </i></p>
                                    @endif

                                @elseif( (get_product_type($single_product_details['id']) == 'configurable_product' || get_product_type($single_product_details['id']) == 'customizable_product' || get_product_type($single_product_details['id']) == 'downloadable_product') && count(get_product_variations($single_product_details['id'])) > 0 )
                                    <span class="solid-price">{!! get_product_variations_min_to_max_price_html($currency_symbol, $single_product_details['id']) !!} </span>
                                @endif
                            </div>
                            <div class="rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <div class="reviews">3 Reviews <a href="#">( Read reviews )</a></div>
                        </div>

                        <!-- Color Option -->
                        <div class="product-options color-option">
                            <span class="title">Select Color:</span>
                            <ul class="color-list">
                                <li class="aths active"></li>
                                <li class="black"></li>
                                <li class="orange"></li>
                                <li class="pink"></li>
                                <li class="yellow"></li>
                            </ul>
                        </div>

                        <!-- Size Option -->
                        <div class="product-options size-option">
                            <span class="title">Select Size:</span>
                            <ul class="size-list">
                                <li>50ml</li>
                                <li class="active">100ml</li>
                                <li>150ml</li>
                                <li>200ml</li>
                            </ul>
                        </div>

                        <!-- Type Option -->
                        <div class="product-options type-option">
                            <span class="title">Select Type:</span>
                            <ul class="size-list">
                                <li>Fruity Persimmon</li>
                                <li class="active">Rosemary</li>
                                <li>Jasmine</li>
                            </ul>
                        </div>

                        <!-- Quantity Option -->
                        <div class="quantity-options">
                            <div class="item-quantity">Quantity <input class="quantity-spinner" type="text" value="1" name="quant[1]" id="quantity"></div>
                            <input type="hidden" id="affiliation_id" value="{{$affiliation_id??''}}" >
                            <input type="hidden" name="available_stock_val" id="available_stock_val" value="{{ $single_product_details['post_stock_qty'] }}">
                            <input type="hidden" name="backorder_val" id="backorder_val" value="{{ $single_product_details['_product_manage_stock_back_to_order'] }}">
                        </div>

                        <div class="btns-box">
                            <button type="button" class="theme-btn btn-style-one add-to-cart add-to-cart-bg" data-id="{{ $single_product_details['id'] }}"><span class="flaticon-shopping-cart"></span> Add To Cart</button>
                            <button type="button" class="theme-btn btn-style-one"><span class="flaticon-heart"></span></button>
                            <button type="button" class="theme-btn btn-style-one"><span class="flaticon-compare"></span></button>
                        </div>

                        <ul class="product-meta">
                            <li><span class="title">Brand:</span> <a href="#">Bottled Heaven</a></li>
                            <li><span class="title">SKU:</span> <a href="#">6890</a></li>
                            <li><span class="title">Product Type:</span> <a href="#">Women</a></li>
                            <li><span class="title">Product ID:</span> <a href="#">346</a></li>
                            <li><span class="title">Availability:</span> <a href="#">6 In Stock</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Basic Details-->
            
            <!--Product Info Tabs-->
            <div class="product-info-tabs">
                <!--Product Tabs-->
                <div class="prod-tabs tabs-box">
                
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                        <li data-tab="#prod-details" class="tab-btn active-btn">Descripton</li>
                        <li data-tab="#prod-reviews" class="tab-btn">Reviews ({{ count($comments_details) }})</li>
                    </ul>
                    
                    <!--Tabs Container-->
                    <div class="tabs-content">
                        
                        <!--Tab-->
                        <div class="tab active-tab" id="prod-details">
                            <div class="content">
                                {!! string_decode($single_product_details['post_content']) !!}
                            </div>
                        </div>
                        
                        <!--Tab-->
                        <div class="tab" id="prod-reviews">
                             <!-- Comments Area -->
                            @if(count($comments_details) > 0)
                            <div class="comments-area">
                                @foreach($comments_details as $comment) 
                                <div class="comment-box">
                                    <div class="comment">
                                        @if(!empty($comment->user_photo_url))
                                        <div class="author-thumb"><img src="{{ get_image_url( $comment->user_photo_url ) }}" alt=""></div> 
                                        @else
                                        <div class="author-thumb"><img src="{{ default_avatar_img_src() }}" alt=""></div> 
                                        @endif
                                        <div class="comment-info">
                                            <h4 class="name">{{ $comment->display_name }}</h4>
                                            <div class="time">{{ Carbon\Carbon::parse(  $comment->created_at )->format('F d, Y') }}</div>
                                            <div class="rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="far fa-star"></span>
                                            </div>
                                        </div>
                                        <div class="text">{{ $comment->content }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif


                            @include('pages-message.notify-msg-success')
                            @include('pages-message.notify-msg-error')
                            @include('pages-message.form-submit')
                            <!--Comment Form-->
                            <div class="comment-form">
                                <div class="form-outer default-form">
                                    <h4 class="title">Add a review</h4>
                                    <form id="new_comment_form" method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="comments_target" id="comments_target" value="product">
                                        <input type="hidden" name="selected_rating_value" id="selected_rating_value" value="">
                                        <input type="hidden" name="object_id" id="object_id" value="{{ $single_product_details['id'] }}">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 form-group">
                                                <label>Name</label>
                                                <input type="text" name="username" placeholder="Type Here" required="">
                                                <span class="icon far fa-user"></span>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-12 form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Type Here" required="">
                                                <span class="icon far fa-envelope"></span>
                                            </div>

                                            <div class="col-md-6 col-sm-12 form-group">
                                                <label>Ratings</label>
                                                 <div class="leave-rating clearfix">
                                                    <input type="radio" name="rating" id="rating-31" value="1"/>
                                                    <label for="rating-31" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" id="rating-32" value="2"/>
                                                    <label for="rating-32" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" id="rating-33" value="3"/>
                                                    <label for="rating-33" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" id="rating-34" value="4"/>
                                                    <label for="rating-34" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" id="rating-35" value="5"/>
                                                    <label for="rating-35" class="fa fa-star"></label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 form-group">
                                                <label>Your Review</label>
                                                <textarea name="product_review_content" placeholder="Type Here*"></textarea>
                                            </div>
                                            
                                            <div class="col-md-12 col-sm-12 form-group">
                                                <button class="theme-btn icon-btn-one small" type="submit" name="submit-form"><span class="btn-title">Submit</span></button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <!--End Product Info Tabs-->
            
            <!-- Products Section -->
            <section class="products-section-two alternate">
                <div class="auto-container">
                    <div class="sec-title text-center">
                        <span class="title">Just in to store</span>
                        <h2>Related PRODUCTS</h2>
                    </div>
                                                   
                    <div class="row">
                        <!-- Product Block --> 
                        <div class="product-block col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/products/5.png" alt=""></figure>
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
                                    <h4 class="name"><a href="shop-single.html">Curabitur Sed Metus</a></h4>
                                    <span class="price"><del>$30.00</del> $24.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Block --> 
                        <div class="product-block col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/products/6.png" alt=""></figure>
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
                                    <h4 class="name"><a href="shop-single.html">Venenatis Eu Eget</a></h4>
                                    <span class="price"><del>$30.00</del> $24.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Block --> 
                        <div class="product-block col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/products/7.png" alt=""></figure>
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
                                    <h4 class="name"><a href="shop-single.html">Nulla Porta Urna</a></h4>
                                    <span class="price"><del>$30.00</del> $24.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Block --> 
                        <div class="product-block col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/products/8.png" alt=""></figure>
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
                                    <h4 class="name"><a href="shop-single.html">Desodorante Para Mujer</a></h4>
                                    <span class="price"><del>$30.00</del> $24.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Products Section -->
        </div><!-- Product Detail -->
    </div>
</section>
<!-- End Shop Single  -->