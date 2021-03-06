<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{URL::asset('images/telcologo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TELCO-ANNIV</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{session('prenom')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('Home')}}" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Tableau de bord
              </p>
            </a>
          </li>
          <!-- Menu d'administration des anniversaires -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                Anniversaire
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('genereranniv')}}" class="nav-link" target="blank">
                  <i class="fa fa-circle-o text-warning"></i>
                  <p>Générer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-circle-o text-danger"></i>
                  <p>Les Gagnants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listanniv')}}" class="nav-link">
                  <i class="fa fa-circle-o text-info"></i>
                  <p>Liste complète</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Gestion des recompense -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Récompenses
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('recompense')}}" class="nav-link">
                  <i class="fa fa-circle-o text-warning"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listrecompense')}}" class="nav-link">
                  <i class="fa fa-circle-o text-info"></i>
                  <p>Liste complète</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Gestion des candidats -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Candidats
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('candidat')}}" class="nav-link">
                  <i class="fa fa-circle-o text-warning"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listcandidat')}}" class="nav-link">
                  <i class="fa fa-circle-o text-info"></i>
                  <p>Liste complète</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Gestion des candidats -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Amis
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ami')}}" class="nav-link">
                  <i class="fa fa-circle-o text-warning"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listami')}}" class="nav-link">
                  <i class="fa fa-circle-o text-info"></i>
                  <p>Liste complète</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu de la base de données -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                DataBase
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://telcoanniv.com/phpmyadmin" class="nav-link" target="blank">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>PhpMyAdmin</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>