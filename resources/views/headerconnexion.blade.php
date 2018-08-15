<!-- Header -->

<header class="header">

    <!-- Top Bar -->


    <!-- Header Main -->


    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">


                    <div class="main_nav_content d-flex flex-row">


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



