    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        @if(\Illuminate\Support\Facades\Session::has('user') == true)
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_content ml-auto">
                                    <div class="top_bar_user">
                                        <div><a href="{{ url('/admin')  }}">Administrer</a></div>
                                        <div></div>
                                        <div><a href="{{ url('/deconnecter')  }}">Déconnectez-vous</a></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        @else

                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="../images/user.svg" alt=""></div>
                                <div><a href="{{ url('/connection')  }}">Connectez-vous</a></div>
                                <div><a href="{{ url('/inscription')  }}">Creer un compte</a></div>
                                <div></div>
                            </div>

                        </div>

                        @endif
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
                            <div class="logo"><a href="#">OpenTrade</a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="{{url("/search")}}" method="get" class="header_search_form clearfix">
                                        <input type="text" name="keyword" required="required" class="header_search_input" placeholder="Le nom de votre recherche...">
                                        <input id="category_input" name="category_id" value="" hidden type="text">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">Les catégories</span>
                                                <i class="fas fa-chevron-down"></i>
                                                <?php     $categorie = $nom       ?>

                                                <ul class="custom_list clc">
                                                    <li><a onclick="setCategoryInputValue('...')" class="clc" href="#">Toute les catégories</a></li>
                                                    @foreach($categorie as $categorie)
                                                    <li><a onclick="setCategoryInputValue('{!! $categorie->id !!}')" class="clc" href="#">{!! $categorie->description !!}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <script>
                                            function setCategoryInputValue(value) {
                                                var category_input = $("#category_input");
                                                category_input.attr("value", value) ;
                                                console.log('category_id: '+category_input.attr("value")) ;
                                            }
                                        </script>
                                        <button type="submit" class="header_search_button trans_300" value="Submit">
                                            <img src="../images/search.png" alt="">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">


                            <!-- Cart  Le Panier
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

                            -->
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

                            @include('categoriesheaders')

                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="{{ url('/')  }}">Acceuil<i class="fas fa-chevron-down"></i></a>
                                    </li>
                                    <li><a href="{{ url('/produits')  }}">Les produits<i class="fas fa-chevron-down"></i></a></li>
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
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
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

    <!-- Banner -->
    <!-- Le produit phare du jour  -->
