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
                    <i class="fa fa-dashboard"></i> <span>Espace Boutique</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ url('/product')  }}"><i class="fa fa-circle-o"></i> Liste
                            produits</a></li>
                    <li><a href="{{ url('/bilan')  }}"><i class="fa fa-circle-o"></i> Bilan</a></li>
                    <li><a href=""><i class="fa fa-files-o"></i>Statistiques</a></li>
                    <li><a href=""><i class="fa fa-th"></i>Historique</a></li>
                    <li><a href="#"><i class="fa fa-pie-chart"></i>Commande de vos clients</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Vos Dépenses</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i>Paniers</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Blogs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Création d'un Blog</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i>Liste des blogs</a>
                    </li>

                </ul>
            </li>
            <li><a href=""><i class="fa fa-book"></i> <span>Page du trader</span></a></li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>