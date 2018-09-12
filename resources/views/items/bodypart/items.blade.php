<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 12/09/18
 * Time: 19:52
 */
?>
@if($items != null && count($items)>0)
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
    @foreach($items as $item)
        <div class="product_item is_new">
            <div class="product_border"></div>
            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                <a href="{{ url("/explore/{$item['id']}")}}" >
                    <img width="115" height="115" src="{!! $item['picture'] !!}" alt="">
                </a>
            </div>
            <div class="product_content">
                <div class="product_price">{!! $item['price'] !!} CFA</div>
                <div class="product_name"><div><a href="{{ url("/explore/{$item['id']}")}}"  tabindex="0">{!! $item['wording']!!}</a></div></div>
            </div>
            <div class="product_fav"><i class="fas fa-heart"></i></div>
            <ul class="product_marks">
                <li class="product_mark product_new">new</li>
            </ul>
        </div>
    @endforeach
@else
    Aucun produit trouvé !
@endif