
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/ass.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ASS-Personal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/admin.brayan.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

          <!--Muestra el nombre de la persona que inicio sessión-->
          <a href="#" class="d-block">{{Session('usuariologin')[0]['nombreu']}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">Herramientas</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fas fa-user-plus"></i>
              <p>
                Registro usuario
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/listarusuarios" class="nav-link">
             <i class="fas fa-list-alt"></i>
              <p>
                Listar  usuario
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-cog"></i>
              <p>
                Registro personal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-window-restore"></i>
              <p>
                Registro entrada y salida
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-folder-plus"></i>
              <p>
                Registro de bajamedica     
              </p>
            </a>           
          </li>
          <li class="nav-item">


            <a href="#" class="nav-link">
              <i class="fas fa-folder-open"></i>
              <p>
                Permisos Especiales

               <!--Reutilizar mas adelante este "evento icon" 
                <i class="fas fa-angle-left right"></i>
              -->
              </p>
            </a>

              <!--Reutilizar mas adelante este "evento click"
                <ul class="nav nav-treeview">
                </ul>
             --->
          </li>        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>