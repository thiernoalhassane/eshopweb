<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
        <section class="content-header">
            <h1>
                Profile
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{$user_profil["profil"]}}" id="picturePreview" alt="User profile picture">
                                <form class="col-sm-offset-2">
                                    <input type="file" onchange="preview(this, 'picturePreview');"
                                           class="filestyle" data-classButton="btn btn-primary"
                                           data-input="false" data-classIcon="icon-plus"
                                           name="profile" accept="image/png image/jpg image/jpeg"
                                           data-buttonText="Charger une photo">

                                    <h3 class="profile-username text-center">{{ucfirst($user_profil["name"])." ".ucfirst($user_profil["surname"])}}</h3>
                                </form>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Abonnements</b> <a class="pull-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Abonnés</b> <a class="pull-right">543</a>
                                </li>

                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Contacts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>

                            <p class="text-muted">{{$user_profil["email"]}}</p>

                            <hr>

                            <strong><i class="fa fa-phone margin-r-5"></i>Téléphone</strong>

                            <p class="text-muted">{{$user_profil["phone"]}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    <!-- Gestion des méssages d'erreur et de succès pour le formulaire du mot de passe -->
                    @if(Session::has("error_while_submit_form"))
                        @include("partials.error",
                        ["type"=>"warning", "message"=>Session::get("error_while_submit_form")])
                    @elseif(Session::has("success_while_submit_form"))
                        @include("partials.error",
                        ["type"=>"success", "message"=>Session::get("success_while_submit_form")])
                    @endif

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#settings" data-toggle="tab">Informations personnelles</a></li>
                            <li><a href="#timeline" data-toggle="tab">Résumé de vos transactions</a></li>
                            <li><a href="#password" data-toggle="tab">Mot de passe</a></li>
                            <li><a href="#danger_zone" data-toggle="tab">Zone dangereuse</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <form class="form-horizontal" action="{{url("/admin/profile/update")}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nom *</label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{$user_profil["name"]}}" class="form-control" id="name" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="surname" class="col-sm-2 control-label">Prénom</label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{$user_profil["surname"]}}" class="form-control" id="surname" name="surname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>

                                        <div class="col-sm-10">
                                            <input type="email" value="{{$user_profil["email"]}}" required class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-2 control-label">Téléphone *</label>

                                        <div class="col-sm-10">
                                            <input type="text" required value="{{$user_profil["phone"]}}"
                                                   class="form-control" data-inputmask='"mask": "+999 99-99-99-99"' data-mask
                                                   id="phone" name="phone" placeholder="+228 99-99-99-99">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                            <button class="btn btn-warning" type="reset">Effacer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">10 Feb. 2014</span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                            </h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-user bg-aqua"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted
                                                your friend request
                                            </h3>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-comments bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                            </h3>

                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-green">3 Jan. 2014</span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                            </h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="password">


                                <!-- Erreur de validation -->
                                <div class="alert-warning">
                                    @if(isset($errors))
                                        @foreach($errors->all() as $error)
                                            <span class="">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <form action="{{url("/admin/profile/password")}}" method="post" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="current_pass" class="col-sm-2 control-label">
                                            Mot de passe actuelle <i style="color: red">*</i>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="current_pass" id="current_pass" placeholder="Actuel mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_pass" class="col-sm-2 control-label">
                                            Nouveau mot de passe <i style="color: red">*</i>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Nouveau mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_pass_bis" class="col-sm-2 control-label">
                                            Confirmer le mot de passe <i style="color: red">*</i>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="new_pass_bis" name="new_pass_bis" placeholder="Confirmer le mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="btn btn-primary" type="submit">Valider</button>
                                            <button class="btn btn-warning" type="reset">Effacer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="danger_zone">
                                <div class="text-center">
                                    <div class="alert alert-danger">
                                        Les actions éffectuées ici sont irréversibles
                                    </div>
                                </div>
                                <div>
                                    <table class="table table-responsive-sm table-stripped">
                                        <tbody>
                                            <tr>
                                                <td>Supprimer tout les produits</td>
                                                <td><a class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Supprimer tour les abonnements</td>
                                                <td><a class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Supprimer le compte</td>
                                                <td><a class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
{!! HTML::script('administration/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('administration/dist/js/demo.js') !!}
{!! HTML::script('js/adminpanel.js') !!}
{!! HTML::script('js/bootstrap-filestyle.min.js') !!}

</body>
</html>