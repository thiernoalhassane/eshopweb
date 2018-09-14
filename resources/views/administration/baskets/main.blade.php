<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 14/09/18
 * Time: 16:47
 *
 * Page d'affichage de la liste des paniers enregistrés.
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste Des Paniers</title>
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
        <div class="alert-warning">
            @if(isset($errors))
                @foreach($errors->all() as $error)
                    <span class="">{{ $error }}</span>
                @endforeach
            @endif
        </div>
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Message lié à la mise à jour d'un produit -->
                @if(Session::has('error_while_update_item'))
                    @include('partials/error', ['type' => 'warning', 'message' => Session::get('error_while_update_item') ])
                @elseif(Session::has('succes_while_update_item'))
                    @include('partials/error', ['type' => 'success', 'message' => Session::get('succes_while_update_item') ])
                @endif

                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Liste de vos paniers</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if($user_baskets != null)
                                @foreach($user_baskets as $basket)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Panier n° {{$basket["id"]}}, crée le {{$basket['date']}}</h4>
                                            <p>Total: {{$basket["total"]}} FCFA</p>
                                        </div>
                                        <div class="panel-body">
                                            <table id="" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Aperçu</th>
                                                    <th>Produit</th>
                                                    <th>Quantité</th>
                                                    <th>PU</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($basket['purchases'] as $purchase)
                                                    <tr>
                                                        <td>
                                                            <img height="50" width="50" src="{{ $purchase["item"]["picture"] }}" alt="{{ $purchase["item"]["wording"] }}" title="{{ $purchase["item"]["wording"] }}" />
                                                        </td>
                                                        <td>{{ $purchase["item"]["wording"] }}</td>
                                                        <td>{{ $purchase["quantity"] }}</td>
                                                        <td>{{ $purchase["item"]["price"] }}</td>
                                                        <td>
                                                            <a title="consulter" href="{{url("/explore/{$purchase["item"]["id"]}")}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                            <!--<button title="supprimer" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                                            <button type="button" title="modifier" class="btn btn-primary">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>-->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                @endforeach
                            @else
                                <div class="alert alert-primary">
                                    <div class="text-muted text-center" style="font-family: Cousine; font-size: 2em">
                                        Vous n'avez aucun panier enregistré !
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>


        </section>
        <!-- /.content -->
        <!-- modal for item update form -->
        <div class="container">
            <div class="modal fade" role="dialog" id="itemUpdateFormModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="bg-primary modal-header">
                            <button type="button" class="close" data-dismiss="modal">X</button>
                            <div class="modal-title">
                                <h3 class="text-center">Modification</h3>
                            </div>

                        </div>
                        <div class="modal-body">
                            <div id="itemUpdateForm">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
{!! HTML::script('js/adminpanel.js') !!}
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>

</body>
</html>
