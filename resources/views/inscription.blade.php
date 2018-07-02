<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/plugins/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css') !!}
    {!! HTML::style('acceuillogin/plugins/slick-1.8.0/slick.css') !!}
    {!! HTML::style('acceuillogin/styles/main_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/responsive.css') !!}
    {!! HTML::style('administration/dist/css/AdminLTE.min.css') !!}


    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->

    <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->

    <!------ Include the above in your HEAD tag ---------->


</head>

<body>

<div class="super_container">


    @include('headerothers')

    @include('formulaireinscription')


    <!-- Footer -->
    @include('footer')

</div>


{!! HTML::script('acceuillogin/js/jquery-3.3.1.min.js') !!}

{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}

{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}

{!! HTML::script('acceuillogin/plugins/greensock/TweenMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TimelineMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/animation.gsap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/ScrollToPlugin.min.js') !!}
{!! HTML::script('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js') !!}
{!! HTML::script('acceuillogin/plugins/slick-1.8.0/slick.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}
{!! HTML::script('acceuillogin/js/custom.js') !!}
{!! HTML::script('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js') !!}





</body>

</html>