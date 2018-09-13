<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirmation compte</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="v7yj5By2zNbEhFzY6eXZVyQp2gKIbGVpK0dslyFspdA" />

    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/styles/main_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/responsive.css') !!}
    {!! HTML::style('inscriptiontemplate/bootstrap.min.css') !!}
    {!! HTML::style('modal/bootstrap.min.css') !!}




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
                <div class="panel-heading">Confirmation</div>


                <form action="{{ url('/confirmation') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $id }}">


                    <div class="form-group">
                        <label for="token">Veuillez saisir la clé de confirmation</label>
                        <input id="token" name="token" class="form-control" type="text" required>
                        <span id="error_lastname" class="text-danger"></span>
                    </div>


                    <button id="submit" type="submit" value="submit" class="btn btn-primary center">Valider</button>

                </form>

                <span class="float-right"><a href="#" class="btn btn-link"  data-toggle="modal" data-target="#myModal">
  Renvoyer l'email de confirmation !</a></span>
            </div>
        </div>
    </div>
</div>

<!-- Partie du modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title">Email de confirmation</h2>
            </div>
            <form action="{{ url('/email') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $id }}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" class="form-control" type="email" required>
                    <span id="error_lastname" class="text-danger"></span>
                </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" value="submit" class="btn btn-primary center" >Envoyer</button>
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
{!! HTML::script('modal/jquery.min.js') !!}
{!! HTML::script('modal/bootstrap.min.js') !!}

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125640217-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-125640217-1');
</script>

</body>

</html>