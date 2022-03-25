
<!--Page Title-->
<section class="page-title" style="background-image:url({{ URL::asset('public/burst-beetee/images/background/5.jpg') }});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Cart</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Homepage</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Cart Section-->
<section class="cart-section">
    <div class="auto-container">
        
        @if( Cart::count() >0 )
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        @include('includes.csrf-token')

        <div class="cart-upper row">
            <div class="column col-lg-6 col-md-8">
                {{-- <button class="theme-btn btn-style-one">Remove Selected</button> --}}
                {{-- <a href="{{ route('checkout-page') }}" class="theme-btn btn-style-one">Checkout Selected</a> --}}
            </div> 
            <div class="column text-right col-lg-6 col-md-4">
                <a href="{{ route('shop-page') }}" class="theme-btn btn-style-one">Continue Shopping</a>
            </div>
        </div>
        <!--Cart Outer-->
        <div class="cart-outer">
            <div class="table-outer">
                <table class="cart-table">
                    <thead class="cart-header">
                        <tr>
                            <th class="select-column">&nbsp;</th>
                            <th class="prod-column">product</th>
                            <th class="price">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::items() as $index => $items)
                        <tr>
                            <td class="select-column">
                                <div class="checkboxes">
                                    <input id="check-d" type="checkbox" name="check">
                                    <label for="check-d"></label>                                
                                </div>
                            </td>
                            <td class="prod-column">
                                <div class="column-box">
                                    @if(!empty($items->img_src))
                                    <figure class="image"><a href ="#"><img width="100" class="d-block" src="{{ get_image_url( $items->img_src ) }}" alt="{{ basename( get_image_url( $items->img_src ) ) }}" /></a></figure>
                                    @else
                                    <figure class="image"><a href ="#"><img width="100" class="d-block" src="{{ default_placeholder_img_src() }}" alt="" /></a></figure>
                                    @endif
                                    <h4 class="prod-title">{!! $items->name !!}</h4>
                                    <a href="{{ route('details-page', get_product_slug($items->id)) }}" class="overlay-link"></a>
                                </div>
                            </td>
                            <td class="sub-total">{!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}</td>
                            <td class="quantity-options"><div class="item-quantity"><input class="quantity-spinner" type="text" value="{{ $items->quantity }}" name="cart_quantity[{{ $index }}]"></div></td>
                            <td class="total">{!! price_html(  get_product_price_html_by_filter(Cart::getRowPrice($items->quantity, $items->price)), get_frontend_selected_currency() ) !!}</td>
                            <td class="remove"><a type="button" href="{{ route('removed-item-from-cart', $index)}}" class="remove-btn"><span class="flaticon-delete-1"></span></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="cart-totals">
            <div class="row no-gutters">
                <div class="btns-column col-lg-8 col-md-6 col-sm-12">
                    <div class="btn-box">
                        <input type="hidden" name="update_cart" value="{{ trans('frontend.update_cart') }}"/>
                        <button type="submit" class="theme-btn btn-style-one">Update Cart</button>
                        <a href="{{ route('checkout-page') }}" class="theme-btn btn-style-one proceed-btn">Proceed to Checkout</a>
                    </div>
                </div>
                    
                <div class="table-column col-lg-4 col-md-6 col-sm-12">
                    <!--Totals Table-->
                    <ul class="totals-table">
                        <li><h3>CART TOTALS</h3></li>
                        <li class="clearfix total"><span class="col">Cart Subtotal</span><span class="col price">
                            @if($cart_total_manage==1)
                                @if(Cart::getTotal()>$cart_total)
                                <del>{!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!} </del>&nbsp;&nbsp;
                                {!! price_html( get_product_price_html_by_filter(Cart::cartTotalDiscountPrice()), get_frontend_selected_currency() ) !!}
                                @else
                                    {!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!}
                                @endif
                        
                            @else
                            {!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!}
                            @endif
                        </span></li>
                        <li class="clearfix total"><span class="col">Shipping</span><span class="col price">
                            @if(Session::get('shopist_frontend_user_role') == 'Vendor')
                                @if(Cart::getSubTotalAndTax() < 6000 )
                                <div><span>{{ price_html( get_product_price_html_by_filter(100), get_frontend_selected_currency() ) }}</span></div>
                                @endif
                            @else
                                @if( Cart::getSubTotalAndTax() < 1500 )
                                <div><span>{{ price_html( get_product_price_html_by_filter(100), get_frontend_selected_currency() ) }}</span></div>
                                @endif
                            @endif
                        </span></li>
                        <li class="clearfix total final"><span class="col">Total</span><span class="col price">{!! price_html( get_product_price_html_by_filter(Cart::getCartTotal()), get_frontend_selected_currency() ) !!}</span></li>
                    </ul>
                </div>  
            </div>
        </div>

        </form>    
        @else
        <br>
            @include('pages-message.notify-msg-error')
            <h2 class="cart-shopping-label2">{{ trans('frontend.shopping_cart') }}</h2>
            <div class="empty-cart-msg">{{ trans('frontend.empty_cart_msg') }}</div>
            <div class="cart-return-shop"><a class="btn btn-secondary check_out" href="{{ route('shop-page') }}">{{ trans('frontend.return_to_shop') }}</a></div>
        @endif
    </div>
</section>
<!--End Cart Section-->