<!DOCTYPE html>
<html lang="en">
<head>
    <title>OpenTrade Bienvenue</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css') !!}
    {!! HTML::style('acceuillogin/plugins/slick-1.8.0/slick.css') !!}
    {!! HTML::style('acceuillogin/styles/main_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/responsive.css') !!}
    {!! HTML::style('acceuillogin/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') !!}



</head>

<body>


<div class="super_container">

    <!-- Header -->

    @include('header')




    <!-- Characteristics -->
    @include('bannerprincipale')

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


                                <div class="product_grid">
                                    <div class="product_grid_border"></div>

                                    <!-- Product Item  Pour les produits nouveaux
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

                                    <!-- Product Item  Pour les produits en rabais
                                    <div class="product_item discount">
                                        <div class="product_border"></div>
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_1.png" alt=""></div>
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
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{ url('/explore', $id= $produits->id)}}" ><img src="images/new_5.jpg" alt=""></a></div>
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

                                <!-- Shop Page Navigation -->



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
                            <div class="popular_categories_prev popular_categories_nav"><i
                                        class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i
                                        class="fas fa-angle-right ml-auto"></i></div>
                        </div>

                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            <!-- Popular Categories Item -->



                            <!-- Popular Categories Item -->
                            @foreach($nom as $nom)
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img src="images/popular_3.png" alt=""></div>
                                    <div class="popular_category_text">{{ $nom->description}}</div>
                                </div>
                            </div>
                            @endforeach

                            <!-- Popular Categories Item -->


                            <!-- Popular Categories Item -->


                        </div>
                    </div>
                </div>
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

</body>

</html>