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
                <div class="panel-body">
                    <form name="myform" action="" method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group">
                            <label for="myName">Téléphone ou Email *</label>
                            <input id="myName" name="myName" class="form-control" type="text" required>
                            <span id="error_name" class="text-danger"></span>
                        </div>


                        <div class="form-group">
                            <label for="password">Mot de Passe</label>
                            <input id="password" name="password" class="form-control" type="text" required>
                            <span id="error_lastname" class="text-danger"></span>
                        </div>


                        <button id="submit" type="submit" value="submit" class="btn btn-primary center">Valider</button>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->


</div>



</body>

</html>