<!DOCTYPE html>
<html lang="en">
<head>
    <title>Open Trade - Inscription</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="v7yj5By2zNbEhFzY6eXZVyQp2gKIbGVpK0dslyFspdA"/>

    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/styles/main_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/responsive.css') !!}
    <link rel="stylesheet" href="administration/bootstrap/css/bootstrap.min.css">
</head>

<body>

<div class="super_container">
    @if(Session::has('message'))
    @include('partials/error', ['type' => 'info', 'message' => Session::get('message') ])
    @endif

    @if(Session::has('erreur'))
    @include('partials/error', ['type' => 'info', 'message' => Session::get('erreur') ])
    @endif
    @include('headerconnexion')

        <iframe style="width: 100%; margin: auto" src="https://docs.google.com/forms/d/e/1FAIpQLSe7QDLtmXkIwkX0mAEhlKHXIlQE9nzW460pIqKpDHx1VgjoEw/viewform?embedded=true"
                width="700" height="520" frameborder="0" marginheight="0" marginwidth="">Chargement en cours...
        </iframe>

    <!-- Footer -->


</div>


<script src="{{asset('acceuillogin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('acceuillogin/js/custom.js')}}"></script>

</body>

</html>