<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 12/09/18
 * Time: 15:38
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Open Trade - Recherche</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="v7yj5By2zNbEhFzY6eXZVyQp2gKIbGVpK0dslyFspdA" />

    <link rel="stylesheet" href="{{ asset('acceuillogin/styles/bootstrap4/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{ asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{ asset('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('acceuillogin/plugins/slick-1.8.0/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('acceuillogin/styles/main_styles.css')}} ">
    <link rel="stylesheet" href="{{ asset('acceuillogin/styles/responsive.css')}} ">


</head>

<body>
@if(Session::has('bienvenue'))
    @include('partials/error', ['type' => 'info', 'message' => Session::get('bienvenue') ])
@endif


<div class="super_container">

    <!-- Header -->
    @include('header')

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll"
             data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">BIENVENUE SUR OPENTRADE</h2>
        </div>
    </div>

    <!-- Deals of the week -->
    <?php $footer = $nom ?>
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Résultats de la recherche</div>
                            <ul class="clearfix">
                                <li class="active"></li>

                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="col-lg-12">

                            <!-- Shop Content -->

                            <div class="shop_content">
                                <div class="product_grid">
                                    <div class="product_grid_border"></div>
                                    <div id="item_list">
                                        @if($items != null && count($items)>0)
                                            @foreach($items as $item)
                                                <div class="product_item">
                                                    <div class="product_border"></div>
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <a href="{{ url("/explore/{$item['id']}")}}" >
                                                            <img width="115" height="115" src="{!! $item['picture'] !!}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price">{!! $item['price'] !!} CFA</div>
                                                        <div class="product_name"><div><a href="{{ url("/explore/{$item['id']}")}}"  tabindex="0">{!! $item['wording']!!}</a></div></div>
                                                    </div>
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="product_marks">
                                                        <li class="product_mark product_new">new</li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @else
                                            Aucun produit trouvé !
                                        @endif
                                    </div>
                                </div>
                                <ul class="pager">
                                    <li><a class="btn btn-primary" onclick="displayMoreItems()">Voir plus</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Catégories Populaires</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>

                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            @foreach($nom as $nom)
                                <div class="owl-item">
                                    <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img src="images/popular_3.png" alt=""></div>
                                        <div class="popular_category_text">{{ $nom->description}}</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reviews -->

    <div class="characteristics">
        <div class="container">
            <div class="row">
                <!-- Les moyens de livraison -->
                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="images/char_1.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>

                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="images/char_1.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>

                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="images/char_1.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>

                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="images/char_1.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
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
{!! HTML::script('acceuillogin/plugins/slick-1.8.0/slick.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}
{!! HTML::script('acceuillogin/js/custom.js') !!}
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
<script src="{{asset('acceuillogin/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/easing/easing.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('acceuillogin/js/custom.js')}}"></script>

<script>
    var page_num=0 ;
    function displayMoreItems() {

        var request = $.ajax(
            {
                url: '/search/more',
                type: "GET",
                data:
                    {
                        offset: page_num,
                        category:'{!! e(\Illuminate\Support\Facades\Input::get("category_id")) !!}',
                        keyword:'{!! e(\Illuminate\Support\Facades\Input::get("keyword")) !!}'
                    },
                dataType: "html"
            }
        );
        request.done( function (msg) {
            $('#item_list').html(msg)
        }) ;

        page_num++ ;
        console.log("page number: "+page_num) ;
    }
</script>

</body>

</html>
