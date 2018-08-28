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
        body
        {
            background-color: #ff3822;
        }
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
                <h4 style="font-weight: bold;">Erreur d'autorisation</h4>
            </div>
            <div class="panel-body">
                <div class="ft-size-115">
                    Ooops !<br/>
                    Il semble que la communication avec le web service de l'application soit impossible.<br/>
                    Cela peut être dû à l'impossiblité du site web à s'authentifier auprès du web service.
                </div>
            </div>
            <div class="panel-footer">
                Veuillez contacter un des administrateur du site.
                <p>
                    <a class="btn btn-primary" href="mailto:fatigba72@gmail.com">jordy fatigba</a> ou
                    <a class="btn btn-primary" href="mailto:fatigba72@gmail.com">barry thierno</a><br/>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
