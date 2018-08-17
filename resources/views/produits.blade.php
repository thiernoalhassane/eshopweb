<!DOCTYPE html>
<html lang="en">
<head>
    <title>Les Produits</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Togo commerce e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css') !!}
    {!! HTML::style('acceuillogin/styles/shop_styles.css') !!}
    {!! HTML::style('acceuillogin/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') !!}
    {!! HTML::style('acceuillogin/styles/shop_responsive.css') !!}
    -->

    <link rel="stylesheet" type="text/css" href="{{asset('acceuillogin/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('acceuillogin/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('acceuillogin/styles/shop_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('acceuillogin/styles/shop_responsive.css')}}">


</head>

<body>

<div class="super_container">

    <!-- Header -->



    @include('header')

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Les Produits</h2>
        </div>
    </div>

    <!-- Shop -->
    <?php          $footer = $nom                     ?>
    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Les Categories</div>
                            <ul class="sidebar_categories">
                                @foreach($nom as $nom)
                                <li><a href="#">{!! $nom->description !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filtrer Par</div>
                            <div class="sidebar_subtitle">Le Prix</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span> <?php $nombre = count($produits)  ?> {!! $nombre !!} </span> produits trouvés</div>
                            <div class="shop_sorting">
                                <span>Trier Par:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">Les meilleurs ratio<i class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Les meilleurs ratio</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>nom</li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>prix</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>

                            <!-- Product Item
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name"><div><a href="{{ url('/explore')}}" tabindex="0">Philips BT6900A</a></div></div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <!-- Product Item
                            <div class="product_item discount">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center" ><img src="images/featured_1.png" alt=""></div>
                                <div class="product_content">
                                    <div class="product_price">$225<span>$300</span></div>
                                    <div class="product_name"><div><a href="{{ url('/explore')}}" tabindex="0">Huawei MediaPad...</a></div></div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>
                             -->
                            @foreach($produits as $produits)
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <a href="{{ url('/explore', $id= $produits->id)}}"><img src="images/new_5.jpg"
                                                                                            alt=""></a></div>
                                <div class="product_content">
                                    <div class="product_price">{!! $produits->price !!} CFA</div>
                                    <div class="product_name">
                                        <div><a href="{{ url('/explore', $id= $produits->id)}}" tabindex="0">{!!
                                                $produits->wording !!}</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            @endforeach




                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                            <ul class="page_nav d-flex flex-row">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">21</a></li>
                            </ul>
                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>




    <!-- footer -->
    @include('footer')

</div>
<!--
{!! HTML::script('acceuillogin/js/jquery-3.3.1.min.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TweenMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TimelineMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/animation.gsap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/ScrollToPlugin.min.js') !!}
{!! HTML::script('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}
{!! HTML::script('acceuillogin/plugins/Isotope/isotope.pkgd.min.js') !!}
{!! HTML::script('acceuillogin/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') !!}
{!! HTML::script('acceuillogin/plugins/parallax-js-master/parallax.min.js') !!}
{!! HTML::script('acceuillogin/js/shop_custom.js') !!}
-->
<script src="{{asset('acceuillogin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/easing/easing.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('acceuillogin/js/shop_custom.js')}}"></script>

</body>

</html>