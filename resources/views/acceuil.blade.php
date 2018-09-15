<!DOCTYPE html>
<html lang="en">
<head>
    <title>Open Trade - Bienvenue</title>
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
            <h2 class="home_title">BIENVENUE SUR OPEN TRADE</h2>
        </div>
    </div>

    <!-- Deals of the week -->
    <?php          $footer = $nom                     ?>
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Les Produits</div>
                            <ul class="clearfix">
                                <li class="active">La Liste</li>

                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="col-lg-9">

                            <!-- Shop Content -->

                            <div class="shop_content">


                                <div class="product_grid" id="item_list">
                                    <div class="product_grid_border  details"></div>

                                    @foreach($produits as $produits)

                                    <div class="product_item">
                                        <div class="product_border"></div>
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{ url('/explore', $id= $produits->id)}}" ><img height="115" width="115" src="{{$produits->picture}}" alt=""></a></div>
                                        <div class="product_content">
                                            <div class="product_price">{!! $produits->price !!} CFA</div>
                                            <div class="product_name"><div><a href="{{ url('/explore', $id= $produits->id)}}"  tabindex="0">{!! $produits->wording !!}</a></div></div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>

                                    @endforeach

                                </div>
                                <ul class="pager">
                                    <li><a class="btn btn-primary" onclick="displayMoreItems()">Voir plus</a></li>
                                </ul>


                            </div>


                        </div>

                        <div class="shop_page_nav d-flex flex-row">
                        </div>
                    </div>
                </div>
                <!-- Shop Page Navigation -->
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <!-- Partie du Blog
    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="reviews_title_container">
                        <h3 class="reviews_title">Blog : Nouvautés</h3>
                        <div class="reviews_all ml-auto"><a href="{{ url('/blog')  }}">voir tous les <span>blogs</span></a>
                        </div>
                    </div>

                    <div class="reviews_slider_container">


                        <div class="owl-carousel owl-theme reviews_slider">


                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/review_1.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/review_2.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/review_3.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/review_1.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/review_2.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/review_3.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    -->

    <!-- Popular category -->
    @include('bodypart.popular_category')

    <!-- Delivery -->
    @include('bodypart.delivery')

    <!-- Footer -->
    @include('footer')

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
        var page_num = 0;
        function displayMoreItems() {

            var request = $.ajax(
                {
                    url: '/search/moreItems',
                    type: "GET",
                    data: {
                        offset: page_num,

                    },
                    dataType: "html"
                }
            );
            request.done(function (msg) {
                $('#item_list').html(msg)
            });

            page_num++;
            console.log("page number: " + page_num);
        }
    </script>
</body>

</html>