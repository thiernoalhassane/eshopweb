<!DOCTYPE html>
<html lang="en">
<head>
    <title>Panier</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/styles/cart_responsive.css') !!}
    {!! HTML::style('acceuillogin/styles/cart_styles.css') !!}
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style('administration/dist/css/AdminLTE.min.css') !!}


</head>

<body>

<div class="super_container">

    <!-- Header -->

    @include('headerothers')

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Votre Panier</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="images/shopping_cart.jpg" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">MacBook Air 13</div>
                                        </div>

                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">1</div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text">$2000</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text">$2000</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Supprimer</div>
                                            <div class="cart_item_text">
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"
                                                        onclick="return confirm('Voulez vous supprimer cet produit?')">
                                                    <i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">$2000</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_clear">Add to Cart</button>
                            <button type="button" class="button cart_button_checkout">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->


    <!-- Footer -->

    @include('footer')
</div>

{!! HTML::script('acceuillogin/js/jquery-3.3.1.min.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TweenMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TimelineMax.min.js') !!}
{!! HTML::script('acceuillogin/scrollmagic/ScrollMagic.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/animation.gsap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/ScrollToPlugin.min.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}
{!! HTML::script('acceuillogin/js/cart_custom.js') !!}
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