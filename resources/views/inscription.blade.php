<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eshop Connexion</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.4 -->
    {!! HTML::style('templatelogin/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome Icons -->
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    <!-- Theme style -->
    {!! HTML::style('templatelogin/dist/css/AdminLTE.min.css') !!}
    <!-- iCheck -->
    {!! HTML::style('templatelogin/plugins/iCheck/square/blue.css') !!}


</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
       <b>Eshop</b> Web
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"><strong> Connexion  </strong></p>

        <form action="" method="post">
            <div class="form-group has-feedback">
                {!! csrf_field() !!}

                <input type="text" id="nom" name="nom" class="form-control" placeholder="email ou téléphone"  required />

                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Mot de Passe" required />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>

            <div class="row">
                <div class="col-xs-8">
                    <button type="submit" class="btn btn-primary ">Se connecter</button>
                </div>

        </form>
    </div>





</div>
</div>

<!-- jQuery 2.1.4 -->
{!! HTML::script('templatelogin/plugins/jQuery/jQuery-2.1.4.min.js') !!}
<!-- Bootstrap 3.3.2 JS -->
{!! HTML::script('templatelogin/bootstrap/js/bootstrap.min.js') !!}
<!-- iCheck -->
{!! HTML::script('templatelogin/plugins/iCheck/icheck.min.js') !!}
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
</body>
</html>