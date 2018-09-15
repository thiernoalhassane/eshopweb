<!DOCTYPE html>
<html lang="en">
<head>
    <title>Open Trade - {!! $produits->wording  !!}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Togo commerce e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="v7yj5By2zNbEhFzY6eXZVyQp2gKIbGVpK0dslyFspdA" />

    <link rel="stylesheet" type="text/css" href="{{asset('acceuillogin/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('acceuillogin/styles/product_styles.css')}}">
    <link rel="stylesheet" href="{{asset('acceuillogin/styles/product_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('administration/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('administration/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('acceuillogin/styles/main_styles.css')}} ">
    <link rel="stylesheet" href="{{ asset('acceuillogin/styles/responsive.css')}} ">

</head>

<body>

<div class="super_container">
    @if(Session::has('message'))
    @include('partials/error', ['type' => 'info', 'message' => Session::get('message') ])
    @endif
    <!-- Header -->


    @include('header')

    <!-- Single Product -->
    <?php          $footer = $nom                     ?>
    <div class="single_product">
        <div class="container">
            <div class="row">


                <!-- Selected Image -->

                <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="{!! $produits->trader->profil  !!}" alt="profil {!! $produits->trader->name  !!}">

                                <span class="username"><a href="{{ url('/trader', $id= $produits->trader->id)}}">{!! $produits->trader->name  !!} {!! $produits->trader->surname  !!}  </a></span>
                                <span class="description"></span>
                            </div>

                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <img class="img-responsive pad" src="{!! $produits->picture  !!}" alt="aperçu {!! $produits->wording !!}">

                            <p></p>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Partager
                            </button>

                            <span class="pull-right text-muted">
                                <div>
                                    <button class="btn btn-light"><i style="color: cornflowerblue" class="fa fa-thumbs-up"></i> {{$produits->likes->blue}}</button>
                                    <button class="btn btn-light"><i style="color: red" class="fa fa-thumbs-down"></i> {{$produits->likes->red}}</button>
                                </div>
                                Nombre de commentaire <i class="badge">{{count($produits->comments)}}</i></span>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer box-comments">
                            @if(count($produits->comments) > 0)
                                @foreach($produits->comments as $comment)
                                    <div class="box-comment">
                                        <!-- User image -->
                                        <!--<img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">-->
                                        <i class="fa fa-user img-circle img-sm"></i>

                                        <div class="comment-text">
                                            <span class="username">
                                                {{$comment->customer->name}} {{$comment->customer->surname}}
                                                <span class="text-muted pull-right">{{$comment->date}}</span>
                                            </span><!-- /.username -->
                                           {{$comment->message}}

                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                @endforeach
                                @else
                                    Aucun commentaire
                                @endif
                        </div>

                        <!-- /.box-footer -->
                        @if(\Illuminate\Support\Facades\Session::has('user') == true)
                        <div class="box-footer">
                            <?php
                            $user = \Illuminate\Support\Facades\Session::get('user');

                            ?>

                            <form action="{{ url('/addcomment' ) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="userid" value="{{ $user['id'] }}">
                                <input type="hidden" name="itemid" value="{{ $produits->id }}">
                                <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg"
                                     alt="Alt Text">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <input type="text" class="form-control input-sm" name="comment"
                                           placeholder="Votre commentaire">
                                </div>
                            </form>
                        </div>
                        @endif
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>


                <!-- Description -->
                <div class="col-lg-5 order-1">
                    <div class="product_description">
                        <div class="product_category">{!! $produits->category->description !!}</div>
                        <div class="product_name">{!! $produits->wording !!}</div>

                        <div class="product_text">
                            <h4>Détails sur le produit</h4>
                            <div>
                                {!! $produits->description !!}
                            </div>
                        </div>
                        <div class="product_price">Prix Unitiare: {!! $produits->price !!} CFA</div>
                        <div class="order_info d-flex flex-row">
                            <form>
                                <div class="clearfix" style="z-index: 1000;">
                                    <!-- Product Quantity -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="product_quantity clearfix">
                                                <span>Quantité : </span>
                                                <input id="quantity_input" type="text" pattern="[1-9]*" value="1">
                                                <input id="item_stock" hidden type="number" value="{!! $produits->quantity !!}"/>
                                                <input id="unit_price" hidden type="number" value="{!! $produits->price !!}"/>
                                                <div class="quantity_buttons">
                                                    <div id="quantity_inc_button" class="quantity_inc quantity_control">
                                                        <i class="fas fa-chevron-up"></i>
                                                    </div>
                                                    <div id="quantity_dec_button" class="quantity_dec quantity_control">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="product_quantity clearfix">
                                                <span>Stock : {!! $produits->quantity !!} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="button_container">
                                    <button type="button" onclick="addToBasket('{!! $produits->id !!}', '{!! csrf_token() !!}')" class="button cart_button">Ajouter au Panier</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- popular category -->
    <!-- delivery -->
    @include('bodypart.delivery')
    <!-- footer -->
    @include('footer')

</div>

<!--
{!! HTML::script('acceuillogin/js/jquery-3.3.1.min.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/popper.js') !!}
{!! HTML::script('acceuillogin/styles/bootstrap4/bootstrap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TweenMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/TimelineMax.min.js') !!}
{!! HTML::script('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/animation.gsap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/ScrollToPlugin.min.js') !!}
{!! HTML::script('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}
{!! HTML::script('acceuillogin/js/product_custom.js') !!}

{!! HTML::script('administration/plugins/jQuery/jquery-2.2.3.min.js') !!}
{!! HTML::script('administration/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('administration/plugins/fastclick/fastclick.js') !!}
{!! HTML::script('administration/dist/js/app.min.js') !!}
{!! HTML::script('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
{!! HTML::script('administration/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('administration/dist/js/demo.js') !!}

-->
<script src="{{asset('acceuillogin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('acceuillogin/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('acceuillogin/plugins/easing/easing.js')}}"></script>
<script src="{{asset('acceuillogin/js/product_custom.js')}}"></script>
<script src="{{asset('administration/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{asset('administration/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('administration/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('administration/dist/js/app.min.js')}}"></script>
<script src="{{asset('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('administration/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('administration/dist/js/demo.js')}}"></script>
</body>

</html>