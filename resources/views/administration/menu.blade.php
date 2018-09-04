<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Rechercher......">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Espace boutique</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="{{ url('/product')  }}"><i class="fa fa-circle-o"></i> Liste des produits</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin')  }}"><i class="fa fa-circle-o"></i>Ajouter un produit</a>
                    </li>
                    <li>
                        <a href="{{ url('/bilan')  }}"><i class="fa fa-circle-o"></i>Bilan</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-pie-chart"></i>Statistiques</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-shopping-basket"></i>Commandes des clients</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Espace client</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-shopping-bag"></i>Paniers</a></li>
                    <li><a href=""><i class="fa fa-shopping-basket"></i>Commandes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Espace personnel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url("/profile")}}"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-percent"></i>Abonnés</a></li>
                    <li><a href="#"><i class="fa fa-percent"></i>Abonnement</a></li>
                    <li><a href="#"><i class="fa fa-eject"></i>Déconnexion</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>