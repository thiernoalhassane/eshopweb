<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/08/18
 * Time: 17:59
 */?>
<!DOCTYPE html>
<html>
<head>
    <title>Erreur d'autorisation</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- twbt 3.3.7 -->
    <!-- Bootstrap 3.3.6 -->
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    <!-- style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset("css/errors/style.css") }}" />
    <style type="text/css">
        a:hover
        {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container container-fluid">
    <div class="row box" style="">
        <div class="panel panel-primary">
            <div class="blue panel-heading text-center no-border">
                <h4 style="font-weight: bold;">Erreur d'identification</h4>
            </div>
            <div class="panel-body">
                <div class="ft-size-115">
                    Ooops !<br/>
                    Il semblerait que votre compte soit inactif<br/>
                    Ou que vous n'aillez pas de compte sur le site
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-primary" title="s'inscrire" href="{{url("/inscription")}}">S'inscrire</a>
                <a class="btn btn-primary" title="demander un code d'activation" href="{{url("/confirmationaccount")}}">Activation</a><br/>
            </div>
        </div>
    </div>
</div>
</body>
</html>
