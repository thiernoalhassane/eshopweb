<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connection</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="commerce boutique en ligne togo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="v7yj5By2zNbEhFzY6eXZVyQp2gKIbGVpK0dslyFspdA" />

    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/styles/main_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/responsive.css') !!}
    {!! HTML::style('inscriptiontemplate/bootstrap.min.css') !!}
    <link rel="stylesheet" href="administration/plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="administration/dist/css/AdminLTE.min.css">
    @if(Session::has('message'))
    @include('partials/error', ['type' => 'info', 'message' => Session::get('message') ])
    @endif


</head>

<body>

<div class="super_container">

    <!-- Header -->

    @include('headerconnexion')

    <!-- Home -->


    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h2>Connexion</h2>
                </div>
                <div class="row" style="margin: auto; width: 40%">
                    <ul class="nav nav-tabs">
                        <li>
                            <a class="btn btn-link" href="#email" title="Se connecter avec son email" data-toggle="tab">Email</a>
                        </li>
                        <li>
                            <a class="btn btn-link" href="#tel" data-toggle="tab" title="Se sonnecter avec son numéro de téléphone">Numéro de téléphone</a>
                        </li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div id="email" class="tab-pane fade in active">
                            <form  action="{{ url('/connect') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label for="name">Email *</label>
                                    <input id="name" name="name" class="form-control" type="email" required>
                                    <span id="error_name" class="text-danger"></span>
                                </div>


                                <div class="form-group">
                                    <label for="password">Mot de Passe</label>
                                    <input id="password" name="password" class="form-control" type="password" required>
                                    <span id="error_lastname" class="text-danger"></span>
                                </div>
                                @include("connectionButtons")
                            </form>
                        </div>
                        <div id="tel" class="tab-pane fade">

                            <form  action="{{ url('/connect') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label for="name">Numéro de téléphone *</label>
                                    <div class="input-group">
                                        <input type="text" id="name" name="name" class="form-control"
                                               placeholder="+228 92-87-78-78"
                                               data-inputmask='"mask": "+999 99-99-99-99"' data-mask required>
                                    </div>
                                    <span id="error_name" class="text-danger"></span>
                                </div>


                                <div class="form-group">
                                    <label for="password">Mot de Passe</label>
                                    <input id="password" name="password" class="form-control" type="password" required>
                                    <span id="error_lastname" class="text-danger"></span>
                                </div>
                                @include("connectionButtons")
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="float-right"><a href="{{ url('/inscription')  }}" class="btn btn-link">S'inscrire !</a></span>
                    <span><a href="#" class="btn btn-link">Mot de passe oublié ?</a></span>
                </div>
            </div>

            </div>
        </div>
    </div>


    <!-- Footer -->


</div>

<script src="{{asset('acceuillogin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/easing/easing.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('acceuillogin/js/custom.js')}}"></script>
<!-- jQuery 2.2.3 -->
<script src="administration/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="administration/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="administration/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="administration/plugins/input-mask/jquery.inputmask.js"></script>
<script src="administration/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="administration/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE App -->
<script src="administration/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="administration/dist/js/demo.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125640217-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-125640217-1');
</script>

</body>

</html>