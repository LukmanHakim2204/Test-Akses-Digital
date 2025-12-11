 <div class="sidebar" data-background-color="dark">
     <div class="sidebar-logo">
         <!-- Logo Header -->
         <div class="logo-header" data-background-color="dark">
             <a href="index.html" class="logo">
                 <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand"
                     height="20" />
             </a>
             <div class="nav-toggle">
                 <button class="btn btn-toggle toggle-sidebar">
                     <i class="gg-menu-right"></i>
                 </button>
                 <button class="btn btn-toggle sidenav-toggler">
                     <i class="gg-menu-left"></i>
                 </button>
             </div>
             <button class="topbar-toggler more">
                 <i class="gg-more-vertical-alt"></i>
             </button>
         </div>
         <!-- End Logo Header -->
     </div>
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <ul class="nav nav-secondary">

                 <li class="nav-item">
                     <a href="{{ route('dashboard.index') }}">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>

                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Management</h4>
                 </li>

                 <!-- Management User -->
                 <li class="nav-item">
                     <a href="">
                         <i class="fas fa-users-cog"></i>
                         <p>Management User</p>
                     </a>
                 </li>

                 <!-- Customer -->
                 <li class="nav-item">
                     <a href="{{ route('customer.index') }}">
                         <i class="fas fa-user-friends"></i>
                         <p>Management Customer</p>
                     </a>
                 </li>

                 <!-- Project -->
                 <li class="nav-item">
                     <a href="">
                         <i class="fas fa-folder-open"></i>
                         <p>Project</p>
                     </a>
                 </li>

                 <!-- Task -->
                 <li class="nav-item">
                     <a href="">
                         <i class="fas fa-tasks"></i>
                         <p>Task</p>
                     </a>
                 </li>

                 <!-- Orders -->
                 <li class="nav-item">
                     <a href="">
                         <i class="fas fa-shopping-cart"></i>
                         <p>Orders</p>
                     </a>
                 </li>

                 <!-- Finance -->
                 <li class="nav-item">
                     <a href="">
                         <i class="fas fa-coins"></i>
                         <p>Finance</p>
                     </a>
                 </li>

                 <!-- Role -->
                 <li class="nav-item">
                     <a href="">
                         <i class="fas fa-user-shield"></i>
                         <p>Role</p>
                     </a>
                 </li>

             </ul>
         </div>
     </div>

 </div>
