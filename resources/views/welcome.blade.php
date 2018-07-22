<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page du trader</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    {!! HTML::style('administration/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
    {!! HTML::style('administration/dist/css/AdminLTE.min.css') !!}
    {!! HTML::style('administration/dist/css/skins/_all-skins.min.css') !!}


</head>
<body class="hold-transition skin-blue fixed">
<div class="wrapper">

    @include('administration/hearder')
    <!-- Left side column. contains the logo and sidebar -->
    @include('administration/menu')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> Tous les Produits de Mr .... </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                </div>
                <div class="box-body">
                    Start creating your amazing application!
                </div>
                <!-- /.box-body -->

                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>


    @include('administration/footer')
    @include('administration/settings')

</div>
<!-- ./wrapper -->
{!! HTML::script('administration/plugins/jQuery/jquery-2.2.3.min.js') !!}
{!! HTML::script('administration/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('administration/plugins/fastclick/fastclick.js') !!}
{!! HTML::script('administration/dist/js/app.min.js') !!}
{!! HTML::script('administration/plugins/sparkline/jquery.sparkline.min.js') !!}
{!! HTML::script('administration/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('administration/plugins/chartjs/Chart.min.js') !!}
{!! HTML::script('administration/dist/js/pages/dashboard2.js') !!}
{!! HTML::script('administration/dist/js/demo.js') !!}


</body>
</html>



