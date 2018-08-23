<link rel="stylesheet" href="administration/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="administration/plugins/select2/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="administration/dist/css/AdminLTE.min.css">

@if($val == "email")



<form  action="{{ url('/connect') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label for="name">Email *</label>
        <input id="name" name="name" class="form-control" type="email" required>
        <span id="error_name" class="text-danger"></span>
    </div>


    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input id="password" name="password" class="form-control" type="text" required>
        <span id="error_lastname" class="text-danger"></span>
    </div>


    <button id="submit" type="submit" value="submit" class="btn btn-primary center">Valider</button>

</form>

@endif

@if($val == "num")

<form  action="{{ url('/connect') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label for="name">Numéro de Téléphone *</label>
        <div class="input-group">
            <input id="name" name="name" type="text" class="form-control" data-inputmask='"mask": "+999 99-99-99-99"' data-mask required>
        </div>
        <span id="error_name" class="text-danger"></span>
    </div>


    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input id="password" name="password" class="form-control" type="text" required>
        <span id="error_lastname" class="text-danger"></span>
    </div>


    <button id="submit" type="submit" value="submit" class="btn btn-primary center">Valider</button>

</form>





@endif

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