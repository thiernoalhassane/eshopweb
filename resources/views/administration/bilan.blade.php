<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste Des Produits</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Monthly Recap Report</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-box-tool dropdown-toggle"
                                            data-toggle="dropdown">
                                        <i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" style="height: 180px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">

                                    <div class="description-block border-right">
                                                <span class="description-percentage text-green"><i
                                                            class="fa fa-caret-up"></i> 17%</span>
                                        <h5 class="description-header">$35,210.43</h5>
                                        <span class="description-text">TOTAL REVENUE</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block border-right">
                                                <span class="description-percentage text-yellow"><i
                                                            class="fa fa-caret-left"></i> 0%</span>
                                        <h5 class="description-header">$10,390.90</h5>
                                        <span class="description-text">TOTAL COST</span>
                                    </div>
                                    <div class="description-block border-right">
                                                <span class="description-percentage text-green"><i
                                                            class="fa fa-caret-up"></i> 20%</span>
                                        <h5 class="description-header">$24,813.53</h5>
                                        <span class="description-text">TOTAL PROFIT</span>
                                    </div>


                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->

                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>


        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->

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



