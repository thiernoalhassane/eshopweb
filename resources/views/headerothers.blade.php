<!-- Header -->

<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon">
                            <div class="user_icon"><img src="images/user.svg" alt=""></div>
                        </div>
                        <a href="{{ url('/admin')  }}">Administrer</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="images/user.svg" alt=""></div>
                            <div><a href="{{ url('/connection')  }}">Connectez-vous</a></div>
                            <div><a href="{{ url('/inscription')  }}">Creer un compte</a></div>
                            <div></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="#">Eshop</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="#" class="header_search_form clearfix">
                                    <input type="search" required="required" class="header_search_input"
                                           placeholder="Le nom de votre recherche...">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">La catégorie</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">

                                                <!--element recupérer du webservice-->
                                                <li><a class="clc" href="#">All Categories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img
                                                src="images/search.png" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">


                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="images/cart.png" alt="">
                                    <div class="cart_count"><span>10</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="{{ url('/panier')  }}">Votre panier</a></div>
                                    <div class="cart_price">$85</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->


                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="{{ url('/')  }}">Acceuil<i class="fas fa-chevron-down"></i></a>
                                </li>
                                <li><a href="{{ url('/produits')  }}">Les produits<i
                                                class="fas fa-chevron-down"></i></a></li>
                                <li><a href="{{ url('/panier')  }}">Votre Panier<i class="fas fa-chevron-down"></i></a>
                                </li>
                                <li><a href="{{ url('/blog')  }}">Blog<i class="fas fa-chevron-down"></i></a></li>

                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input"
                                       placeholder="Search for products...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">

                            <li class="page_menu_item"><a href="{{ url('/')  }}">Acceuil<i
                                            class="fas fa-chevron-down"></i></a></li>

                            <li class="page_menu_item"><a href="{{ url('/produits')  }}">Les produits<i
                                            class="fas fa-chevron-down"></i></a></li>
                            <li class="page_menu_item"><a href="{{ url('/panier')  }}">Votre Panier<i
                                            class="fas fa-chevron-down"></i></a></li>
                            <li class="page_menu_item"><a href="{{ url('/blog')  }}">Blog<i
                                            class="fas fa-chevron-down"></i></a></li>

                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>


</header>



