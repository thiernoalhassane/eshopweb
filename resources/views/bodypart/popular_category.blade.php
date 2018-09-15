<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 14/09/18
 * Time: 23:31
 *
 * Le panel des catégories populaires
 */
?>
<!-- Popular Categories Slider -->
<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Catégories Populaires</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i
                                    class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i
                                    class="fas fa-angle-right ml-auto"></i></div>
                    </div>

                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        <!-- Popular Categories Item -->



                        <!-- Popular Categories Item -->
                        @foreach($footer as $nom)
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img src="images/popular_3.png" alt=""></div>
                                    <div class="popular_category_text">{{ $nom->description}}</div>
                                </div>
                            </div>
                    @endforeach

                    <!-- Popular Categories Item -->


                        <!-- Popular Categories Item -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
