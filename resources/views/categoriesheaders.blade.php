
<div class="cat_menu_container">
    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
        <div class="cat_burger"><span></span><span></span><span></span></div>
        <div class="cat_menu_text">Les catégories</div>
    </div>

    <ul class="cat_menu">

        <!-- placer ici les resultats du webservice-->

        <!--
        <li><a href="#">Computers & Laptops <i class="fas fa-chevron-right ml-auto"></i></a></li>
        <li><a href="#">Cameras & Photos<i class="fas fa-chevron-right"></i></a></li>
        <li class="hassubs">
            <a href="#">Hardware<i class="fas fa-chevron-right"></i></a>
            <ul>
                <li class="hassubs">
                    <a href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
                    <ul>
                        <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                        <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                        <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                        <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                    </ul>
                </li>
                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
            </ul>
        </li>
        <li><a href="#">Smartphones & Tablets<i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#">TV & Audio<i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#">Gadgets<i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#">Car Electronics<i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#">Video Games & Consoles<i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#">Accessories<i class="fas fa-chevron-right"></i></a></li>

        -->

        @foreach($nom as $nom)
        <li><a href="#"> {!! $nom->description !!} <i class="fas fa-chevron-right"></i></a></li>
        @endforeach


    </ul>
</div>