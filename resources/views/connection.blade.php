<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connection</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/styles/main_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/responsive.css') !!}
    {!! HTML::style('inscriptiontemplate/bootstrap.min.css') !!}

    @if(Session::has('message'))
    @include('partials/error', ['type' => 'info', 'message' => Session::get('message') ])
    @endif


</head>

<body>

<div class="super_container">

    <!-- Header -->

    @include('headerconnexion')

    <!-- Home -->


    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Connection</div>





                        <button id="submit" type="submit" value="email" class="btn btn-primary center" onclick="ecran($(this).val(),'connection','connectionajax')">Se Connecter avec Son Email</button>
                        <button id="submit" type="submit" value="num" class="btn btn-primary center" onclick="ecran($(this).val(),'connection','connectionajax')">Se Connecter avec Son Numéro</button>
                <div class="panel-body" id="connection">



                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->


</div>

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
    function ecran(val, idvu, fichier, param) {
        var req = $.ajax({
            url: '{{URL::to('/ecran')}}',
            type: "GET",
            data: {val: val, fichier: fichier, param: param},
            dataType: "html"
        });
        req.done(function (msg) {
            $('#' + idvu).html(msg);
        });
    }
</script>

</body>

</html>