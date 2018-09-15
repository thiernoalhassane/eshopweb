<!DOCTYPE html>
<html lang="en">
<head>
    <title>Open Trade - Panier</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="v7yj5By2zNbEhFzY6eXZVyQp2gKIbGVpK0dslyFspdA" />

    {!! HTML::style('acceuillogin/styles/bootstrap4/bootstrap.min.css') !!}
    {!! HTML::style('acceuillogin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}
    {!! HTML::style('acceuillogin/styles/cart_responsive.css') !!}
    {!! HTML::style('acceuillogin/styles/cart_styles.css') !!}
    <link rel="stylesheet" href="{{ asset('acceuillogin/styles/responsive.css')}} ">

</head>

<body>

<div class="super_container">

    <!-- Header -->

    <?php          $footer = $nom        ;             ?>
    @include('header')

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div id="cart_container" class="cart_container">
                        @if($items != null && count($items) > 0)
                            <div class="cart_title">Votre Panier</div>
                            <div class="cart_items">
                            <ul class="cart_list">
                                    @foreach($items as $item)
                                        <li id="{!! $item["id"] !!}" class="cart_item clearfix">
                                            <div class="cart_item_image"><img src="{{$item["picture"]}}" alt=""></div>
                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Libellé</div>
                                                    <div class="cart_item_text">{{$item["wording"]}}</div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Quantité</div>
                                                    <div class="cart_item_text">{{$basket[$item["id"]]["quantity"]}}</div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Prix</div>
                                                    <div class="cart_item_text">{{$item["price"]}} FCFA</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Total</div>
                                                    <div class="cart_item_text">{{$item["price"]*$basket[$item["id"]]["quantity"]}} FCFA</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Supprimer</div>
                                                    <div class="cart_item_text">
                                                        <button type="button" title="supprimer" class="btn btn-danger" data-widget="remove"
                                                                onclick="deleteOneInBasket('{!! $item['id'] !!}', '{!! csrf_token() !!}')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                @endforeach
                            </ul>
                        </div>
                            <!-- Order Total -->
                            <div class="order_total">
                                <div class="order_total_content text-md-right">
                                    <div class="order_total_title">Total du panier:</div>
                                    <div id="order_total_amount" class="order_total_amount">
                                        <?php
                                        $item_total_price=0.0;
                                        $total_item=0;
                                        if(\Illuminate\Support\Facades\Session::get("basket", null) != null)
                                        {
                                            $total_item = count(\Illuminate\Support\Facades\Session::get("basket")) ;
                                            foreach (\Illuminate\Support\Facades\Session::get("basket") as $value)
                                            {
                                                $item_total_price += (double)$value["total_price"]*$value["quantity"] ;
                                            }
                                            echo $item_total_price." FCFA" ;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center text-muted fa-2x">Votre panier est vide</div>
                        @endif

                        @if(\Illuminate\Support\Facades\Session::has("basket") && \Illuminate\Support\Facades\Session::get("basket") != null)
                            <div class="cart_buttons">
                                <button type="button" onclick="saveBasket()" class="button cart_button_clear">Enregister</button>
                                <button type="button" class="button cart_button_checkout">Commander</button>
                            </div>
                        @endif

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
{!! HTML::script('acceuillogin/plugins/scrollmagic/ScrollMagic.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/animation.gsap.min.js') !!}
{!! HTML::script('acceuillogin/plugins/greensock/ScrollToPlugin.min.js') !!}
{!! HTML::script('acceuillogin/plugins/easing/easing.js') !!}
{!! HTML::script('acceuillogin/js/cart_custom.js') !!}



















</body>

</html>