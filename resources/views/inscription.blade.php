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
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {!! HTML::style('administration/dist/css/AdminLTE.min.css') !!}



    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->

    <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->

    <!------ Include the above in your HEAD tag ---------->


</head>

<body>

<div class="super_container">


    @include('headerconnexion')

    @include('formulaireinscription')


    <!-- Footer -->


</div>


{!! HTML::script('acceuillogin/js/jquery-3.3.1.min.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}
{!! HTML::script('administration/plugins/jQuery/jquery-2.2.3.min.js') !!}
{!! HTML::script('administration/bootstrap/js/bootstrap.min.js') !!}


{!! HTML::script('administration/plugins/fastclick/fastclick.js') !!}
{!! HTML::script('administration/dist/js/app.min.js') !!}
{!! HTML::script('administration/dist/js/demo.js') !!}
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