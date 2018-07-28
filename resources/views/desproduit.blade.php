<!DOCTYPE html>
<html lang="en">
<head>
    <title>Les Produits</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Togo commerce e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}
    {!! HTML::style('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css') !!}
    {!! HTML::style('acceuillogin/styles/product_styles.css') !!}
    {!! HTML::style('acceuillogin/styles/product_responsive.css') !!}
    {!! HTML::style('administration/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style('administration/dist/css/AdminLTE.min.css') !!}


</head>

<body>

<div class="super_container">

    <!-- Header -->


    @include('header')

    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">


                <!-- Selected Image -->

                <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                                <span class="description">Shared publicly - 7:30 PM Today</span>
                            </div>

                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo">

                            <p>I took this photo this morning. What do you guys think?</p>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share
                            </button>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like
                            </button>
                            <span class="pull-right text-muted">127 likes - 3 comments</span>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer box-comments">
                            <div class="box-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                                <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.box-comment -->
                            <div class="box-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                                <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.box-comment -->
                        </div>
                        <!-- /.box-footer -->
                        <div class="box-footer">
                            <form action="#" method="post">
                                <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg"
                                     alt="Alt Text">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <input type="text" class="form-control input-sm"
                                           placeholder="Press enter to post comment">
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>


                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">Laptops</div>
                        <div class="product_name">MacBook Air 13</div>

                        <div class="product_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a
                                faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis.</p></div>
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>Quantity: </span>
                                        <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                        class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                        class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>


                                </div>

                                <div class="product_price">$2000</div>
                                <div class="button_container">
                                    <button type="button" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- footer -->
    @include('footer')

</div>


{!! HTML::script('acceuillogin/js/jquery-3.3.1.min.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TweenMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TimelineMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/animation.gsap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/ScrollToPlugin.min.js') !!}
{!! HTML::script('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js') !!}
{!! HTML::script('acceuillogin/plugins/slick-1.8.0/slick.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}
{!! HTML::script('acceuillogin/plugins/Isotope/isotope.pkgd.min.js') !!}
{!! HTML::script('acceuillogin/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') !!}
{!! HTML::script('acceuillogin/plugins/parallax-js-master/parallax.min.js') !!}
{!! HTML::script('acceuillogin/js/product_custom.js') !!}
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