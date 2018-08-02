<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/styles/main_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/responsive.css') !!}
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style('administration/dist/css/AdminLTE.min.css') !!}


</head>

<body>

<div class="super_container">


    @include('headerconnexion')

    @include('formulaireadd')


    <!-- Footer -->


</div>

{!! HTML::script('administration/plugins/jQuery/jquery-2.2.3.min.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}
{!! HTML::script('administration/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('administration/plugins/fastclick/fastclick.js') !!}
{!! HTML::script('administration/dist/js/app.min.js') !!}
{!! HTML::script('administration/dist/js/demo.js') !!}


</body>

</html>