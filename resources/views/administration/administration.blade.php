<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->

    {!! HTML::style('administration/dist/css/AdminLTE.min.css') !!}

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    {!! HTML::style('administration/dist/css/skins/_all-skins.min.css') !!}
    {!! HTML::style('administration/plugins/iCheck/flat/blue.css') !!}
    {!! HTML::style('administration/plugins/morris/morris.css') !!}
    <!-- iCheck -->

    {!! HTML::style('administration/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}

    {!! HTML::style('administration/plugins/datepicker/datepicker3.css') !!}
    {!! HTML::style('administration/plugins/daterangepicker/daterangepicker.css') !!}

    {!! HTML::style('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue fixed">
<div class="wrapper">
    @include('administration/hearder')
    @include('administration/menu')
    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-pricetag-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Inventory</span>
                            <span class="info-box-number">90</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-ios-heart-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Mentions Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    @include('administration/addproduct')
                    <!-- Horizontal Form -->

                    <!-- /.nav-tabs-custom -->

                    <!-- Chat box -->
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
                    <!-- /.box (chat box) -->

                    <!-- TO DO List -->

                    <!-- /.box -->

                    <!-- quick email widget -->


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-6 connectedSortable">

                    <!-- Map box -->

                    <!-- /.box -->

                    <!-- solid sales graph -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Orders</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Popularity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="label label-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                90,80,90,-70,61,-83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="label label-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                90,80,-90,70,61,-83,68
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="label label-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                90,-80,90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="label label-info">Processing</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                90,80,-90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="label label-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                90,80,-90,70,61,-83,68
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="label label-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                90,-80,90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="label label-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                90,80,90,-70,61,-83,63
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New
                                Order</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All
                                Orders</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Added Products</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Samsung TV
                                            <span class="label label-warning pull-right">$1800</span></a>
                                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Bicycle
                                            <span class="label label-info pull-right">$700</span></a>
                                        <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Xbox One <span
                                                    class="label label-danger pull-right">$350</span></a>
                                        <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">PlayStation 4
                                            <span class="label label-success pull-right">$399</span></a>
                                        <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>


                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('administration/footer')
    @include('administration/settings')
</div>
<!-- ./wrapper -->
{!! HTML::script('administration/plugins/jQuery/jquery-2.2.3.min.js') !!}
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>


{!! HTML::script('administration/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('administration/plugins/fastclick/fastclick.js') !!}
{!! HTML::script('administration/dist/js/app.min.js') !!}
{!! HTML::script('administration/plugins/sparkline/jquery.sparkline.min.js') !!}
{!! HTML::script('administration/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! HTML::script('administration/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
{!! HTML::script('administration/plugins/chartjs/Chart.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! HTML::script('administration/plugins/morris/morris.min.js') !!}


{!! HTML::script('administration/plugins/knob/jquery.knob.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
{!! HTML::script('administration/plugins/daterangepicker/daterangepicker.js') !!}

{!! HTML::script('administration/plugins/datepicker/bootstrap-datepicker.js') !!}
{!! HTML::script('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}

{!! HTML::script('administration/plugins/slimScroll/jquery.slimscroll.min.js') !!}


{!! HTML::script('administration/dist/js/pages/dashboard.js') !!}

{!! HTML::script('administration/dist/js/pages/dashboard2.js') !!}

{!! HTML::script('administration/dist/js/demo.js') !!}


</body>
</html>