<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
   <center>   <span class="brand-text font-weight-light">Admin Panel</span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
      
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
      
             <li class="nav-item ">
            <a href="{{route('dashbord')}}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
      
          <li class="nav-item ">
            <a href="{{ route('form') }}" class="nav-link">
              <i class="nav-icon fa fa-plus-square"></i>
              <p>
                  Add Category
              </p>
            </a>
          </li>
           {{-- <li class="nav-item ">
            <a href="{{route('list')}}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                  List
              </p>
            </a>
          </li> --}}
               <li class="nav-item ">
            <a href="{{route('newlist')}}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                List
              </p>
            </a>
          </li>
               <li class="nav-item ">
            <a href="{{route('list_cart')}}" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Cart 
              </p>
            </a>
          </li>
           
              <li class="nav-item ">
            <a href="{{route('signOut')}}" class="nav-link">
              <i class="nav-icon fa fa-times"></i>
              <p>
            Logout
              </p>
            </a>
          </li>
    
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>