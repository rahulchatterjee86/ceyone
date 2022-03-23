<!-- Main Header-->
<header class="main-header">
    <!-- Header top -->
    <div class="header-top">
        <div class="row">
            <div class="col top-left">
                <ul class="contact-list clearfix">
                    <li><i class="icon flaticon-telephone-1"></i> <a href="tel:033 40631211">033 40631211</a></li>
                    <li><i class="icon flaticon-mail"></i> <a href="mailto:info@ceyone.co.in">info@ceyone.co.in</a></li>
                </ul>
            </div>
            <div class="col top-center">
                <div class="text">Free shipping on international orders of $150+</div>
            </div>
            <div class="col top-right">
                <div class="text"><span class="icon flaticon-time-1"></span>Mon-Sat: 7.00 - 18.00 / Sun: Closed</div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <div class="main-box">
        <!--Mobile Navigation Toggler-->
        <div class="mobile-nav-toggler"><span class="icon fa fa-bars"></span></div>

        <div class="logo"><a href="{{ url("/") }}"><img src="{{ URL::asset('public/burst-beetee/images/logo.png') }}" alt=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer">
            <!-- Main Menu -->
            <nav class="main-menu navbar-expand-md">
                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                    <ul class="navigation clearfix">
                        <li class="dropdown has-mega-menu"><a href="#">Shop</a>
                            <div class="mega-menu">
                                <div class="mega-menu-bar row clearfix">
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>Health Care</h3>
                                        <ul>
                                            <li><a href="{{ url("/product/categories/health-care") }}">Health Care</a></li>
                                        </ul>
                                    </div>
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>Oral Care</h3>
                                        <ul>
                                            <li><a href="{{ url("/product/categories/oral-care") }}">Oral Care</a></li>
                                        </ul>
                                    </div>
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>Agri Care</h3>
                                        <ul>
                                            <li><a href="{{ url("/product/categories/agri-care") }}">Agri Care</a></li>
                                        </ul>
                                    </div>
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>Agri Care</h3>
                                        <ul>
                                            <li><a href="{{ url("/product/categories/personal-care") }}">Personal care</a></li>
                                        </ul>
                                    </div>
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/mega-menu-shop.jpg') }}" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown"><a href="blog.html">About</a>
                            <ul>
                                <li><a href="{{ url("/page/about") }}">Company Profile</a></li>
                                <li><a href="{{ url("/page/vision-mission") }}">Vision and Mission</a></li>
                                <li><a href="{{ url("#") }}">Manufacturing Process</a></li>

                            </ul>
                        </li>
                        <!--<li class="dropdown has-mega-menu"><a href="#">Pages</a>
                            <div class="mega-menu">
                                <div class="mega-menu-bar row clearfix">
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>Shop</h3>
                                        <ul>

                                            <li><a href="shop.html">Shop Grid</a></li>
                                            <li><a href="shop-three-col.html">Shop 3 col</a></li>
                                            <li><a href="shop-four-col.html">Shop 4 col</a></li>
                                            <li><a href="shop-left-sidebar.html">Shop W/LS</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop W/RS</a></li>
                                            <li><a href="shop-single.html">Shop Single</a></li>
                                        </ul>
                                    </div>
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>E Commerce</h3>
                                        <ul>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="account.html">Account</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">Register</a></li>
                                        </ul>
                                    </div>
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>About BB</h3>
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="appointment.html">Appointment</a></li>
                                            <li><a href="team.html">Team Grid</a></li>
                                            <li><a href="team-single.html">Team Detail</a></li>
                                        </ul>
                                    </div>
                                    <div class="column col-lg-3 col-md-3 col-sm-12">
                                        <h3>Pre Build</h3>
                                        <ul>
                                            <li><a href="faqs.html">FAQs</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="404-error.html">Erorr 404</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="search-error.html">No Search Result</a></li>
                                        </ul>
                                    </div>
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ URL::asset('public/burst-beetee/images/resource/mega-menu-pages.jpg') }}" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </li>-->
                        <li class="dropdown"><a href="javascript:;">News</a>
                            <ul>
                                <li class="dropdown"><a  href="{{ url("#") }}">Achievers</a>
                                    <ul>
                                        <li><a href="{{ url("/categories/executive-director") }}">Executive Director</a></li>
                                        <li><a href="{{ url("/categories/executive-senior-director") }}">Executive Senior Director</a></li>
                                        <li><a href="{{ url("/categories/executive-silver-director") }}">Executive Silver Director</a></li>
                                        <li><a href="{{ url("/categories/executive-gold-director") }}">Executive Gold Director</a></li>
                                        <li><a href="{{ url("/categories/executive-ruby-director") }}">Executive Ruby Director</a></li>
                                        <li><a href="{{ url("/categories/executive-emerald-director") }}">Executive Emerald Director</a></li>
                                        <li><a href="{{ url("/categories/executive-diamond-director") }}">Executive Diamond Director</a></li>
                                        <li><a href="{{ url("/categories/chairmans-club") }}">Chairman's Club</a></li>
                                    </ul>
                                </li>
                                <li><a  href="{{ url("#") }}">Notices</a> </li>            
                                <li><a  href="{{ url("#") }}">Promotions and offers</a></li>
                                <li><a href="{{url("/testimonials") }}">Testimonials</a></li>
                                <li><a href="{{url("/gallery") }}">Gallery</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="{{url("#") }}">Opportunity</a>
                            <ul> 
                                <li><a href="{{url("/page/opportunity") }}">Business Plan</a></li>
                                <li><a href="{{url("/downloads") }}">Download</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main Menu End-->

            <!-- Outer box -->
            <div class="outer-box">
                <ul class="options-list">
                    <li><button class="search-btn"><span class="icon flaticon-loupe"></span></button></li>
                    <li><a href="{{ route('user-account-page') }}"><span class="icon flaticon-user-1"></span></a></li>
                    <li><a href="#"><span class="icon flaticon-compare"></span></a></li>
                    <li><a href="wishlist.html"><span class="icon flaticon-heart"></span></a></li>
                    <li class="cart-icon"><button type="button" class="cart-btn"><span class="cart-number">{{ Cart::count() }}</span><span class="icon flaticon-shopping-cart"></span></button></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Header Search -->
    <div class="search-popup">
        <span class="search-back-drop"></span>
        <button class="close-search"><span class="fa fa-times"></span></button>
        
        <div class="search-inner">
            <form method="get" action="{{ route('shop-page') }}">
                <div class="form-group">
                    <input type="search" name="srch_term" value="" placeholder="Search..." required="">
                    <button type="submit"><i class="flaticon-search-1"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Header Search -->
    
    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="index.html" title=""><img src="{{ URL::asset('public/burst-beetee/images/logo-small.png') }}" alt="" title=""></a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-collapse show collapse clearfix">
                         <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
        </div>
    </div><!-- End Sticky Menu -->
    
    <!-- Sidebar Cart  -->
    <div class="sidebar-cart">
        <span class="cart-back-drop"></span>
        <div class="shopping-cart">
            <div class="cart-header">
                <div class="title">Shopping Cart <span>({{ Cart::count() }})</span></div>
                <button class="close-cart"><span class="flaticon-add"></span></button>
            </div>
            <ul class="shopping-cart-items">
                @foreach(Cart::items() as $index => $items)
                <li class="cart-item">
                    @if($items->img_src)  
                    <a href="{{ route('details-page', get_product_slug($items->id)) }}"><img src="{{ get_image_url($items->img_src) }}" alt="#" class="thumb" alt="product" /></a>
                    @else
                    <a href="{{ route('details-page', get_product_slug($items->id)) }}"><img src="{{ default_placeholder_img_src() }}" alt="no_image"></a>
                    @endif
                    <span class="item-name">{!! $items->name !!}</span>
                    <span class="item-quantity">{{ $items->quantity }} x <span class="item-amount">${{ $items->price }}</span></span>
                    <a href="{{ route('details-page', get_product_slug($items->id)) }}" class="product-detail"></a>
                    <a href="{{ route('removed-item-from-cart', $index)}}" class="remove">Remove</a>
                </li>
                @endforeach
            </ul>

            <div class="cart-footer">
                <div class="shopping-cart-total"><strong>Subtotal:</strong> {!! price_html( get_product_price_html_by_filter(Cart::getTotal()) ) !!}</div>
                <a href="{{ route('cart-page') }}" class="theme-btn btn-style-one"><span class="btn-title">View Cart</span></a>
                <a href="{{ route('checkout-page') }}" class="theme-btn btn-style-one"><span class="btn-title">Checkout</span></a>
            </div>
        </div> <!--end shopping-cart -->
    </div>
    <!-- End Sidebar Cart  -->
</header>
<!--End Main Header -->

<!-- Menu Backdrop -->
<div class="menu-backdrop"></div>

<!-- Mobile Menu  -->
<div class="mobile-menu">

    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
    <nav class="menu-box">
        <div class="mobile-upper">
            <div class="close-btn"><span class="icon flaticon-add"></span></div>
            <div class="logo"><img src="{{ URL::asset('public/burst-beetee/images/logo-small.png') }}" alt=""></div>
        </div>

        <!-- Menu Outer -->
        <div class="menu-outer">
            <!--Keep This Empty / Icons will come through Javascript-->
        </div>
        
        <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>


        <div class="site-info">
            <!--Keep This Empty / Info will come through Javascript-->
        </div>
    </nav>

</div><!-- End Mobile Menu -->