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
    {!! HTML::style('administration/plugins/datatables/dataTables.bootstrap.css') !!}
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
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Listes de vos produits</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nom du produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td>
                                        <form method="get" action="">
                                            <input type="hidden" name="_token" value="">
                                            <input type="hidden" name="id" value="">
                                            <button class="b">Modifier</span>
                                            </button>
                                        </form>

                                        <form method="POST" action="">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="id" value="">
                                            <button class="b"
                                                    onclick="return confirm('Voulez vous supprimer cet produit?')">
                                                Supprimer</span>
                                            </button>


                                    </td>

                                </tr>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
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
{!! HTML::script('administration/plugins/datatables/jquery.dataTables.min.js') !!}
{!! HTML::script('administration/plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! HTML::script('administration/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('administration/plugins/fastclick/fastclick.js') !!}
{!! HTML::script('administration/dist/js/app.min.js') !!}
{!! HTML::script('administration/dist/js/demo.js') !!}
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>

</body>
</html>