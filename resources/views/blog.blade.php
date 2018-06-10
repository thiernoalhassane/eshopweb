<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/plugins/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css') !!}
    {!! HTML::style('acceuillogin/styles/blog_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/blog_responsive.css') !!}


</head>

<body>

<div class="super_container">

    <!-- Header -->

    @include('header')

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll"
             data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Les Blog</h2>
        </div>
    </div>

    <!-- Blog -->

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_1.jpg)"></div>
                            <div class="blog_text">Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et
                                malesuada.
                            </div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_2.jpg)"></div>
                            <div class="blog_text">Cras lobortis nisl nec libero pulvinar lacinia. Nunc sed ullamcorper
                                massa.
                            </div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_3.jpg)"></div>
                            <div class="blog_text">Fusce tincidunt nulla magna, ac euismod quam viverra id. Fusce eget
                                metus feugiat
                            </div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_4.jpg)"></div>
                            <div class="blog_text">Etiam leo nibh, consectetur nec orci et, tempus tempus ex</div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_5.jpg)"></div>
                            <div class="blog_text">Sed viverra pellentesque dictum. Aenean ligula justo, viverra in
                                lacus porttitor
                            </div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_6.jpg)"></div>
                            <div class="blog_text">In nisl tortor, tempus nec ex vitae, bibendum rutrum mi. Integer
                                tempus nisi
                            </div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_7.jpg)"></div>
                            <div class="blog_text">Make Life Easier on Yourself by Accepting “Good Enough.” Don’t Pursue
                                Perfection.
                            </div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_8.jpg)"></div>
                            <div class="blog_text">13 Reasons You Are Failing At Life And Becoming A Bum</div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url(images/blog_9.jpg)"></div>
                            <div class="blog_text">4 Steps to Getting Anything You Want In Life</div>
                            <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Footer -->
    @include('footer')

</div>


{!! HTML::script('acceuillogin/plugins/parallax-js-master/parallax.min.js') !!}
{!! HTML::script('acceuillogin/js/blog_custom.js') !!}
{!! HTML::script('acceuillogin/js/jquery-3.3.1.min.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TweenMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TimelineMax.min.js') !!}
{!! HTML::script('acceuillogin/scrollmagic/ScrollMagic.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/animation.gsap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/ScrollToPlugin.min.js') !!}
{!! HTML::script('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}


</body>

</html>