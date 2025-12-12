<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
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
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                {{-- DASHBOARD --}}
                @can('view dashboard')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Management</h4>
                </li>

                {{-- MANAGEMENT USER --}}
                @can('view user')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}">
                            <i class="fas fa-users-cog"></i>
                            <p>Management User</p>
                        </a>
                    </li>
                @endcan

                {{-- CUSTOMER --}}
                @can('view customer')
                    <li class="nav-item">
                        <a href="{{ route('customer.index') }}">
                            <i class="fas fa-user-friends"></i>
                            <p>Management Customer</p>
                        </a>
                    </li>
                @endcan

                {{-- PROJECT --}}
                @can('view project')
                    <li class="nav-item">
                        <a href="{{ route('project.index') }}">
                            <i class="fas fa-folder-open"></i>
                            <p>Project</p>
                        </a>
                    </li>
                @endcan

                {{-- TASK --}}
                @can('view task')
                    <li class="nav-item">
                        <a href="{{ route('task.index') }}">
                            <i class="fas fa-tasks"></i>
                            <p>Task</p>
                        </a>
                    </li>
                @endcan

                {{-- ORDERS --}}
                @can('view orders')
                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                @endcan

                {{-- FINANCE --}}
                @can('view finance')
                    <li class="nav-item">
                        <a href="{{ route('finances.index') }}">
                            <i class="fas fa-coins"></i>
                            <p>Finance</p>
                        </a>
                    </li>
                @endcan

                {{-- ROLE --}}
                @can('view role')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}">
                            <i class="fas fa-user-shield"></i>
                            <p>Role</p>
                        </a>
                    </li>
                @endcan
                {{-- REPORT --}}
                @can('view reports')
                    <li class="nav-item">
                        <a href="{{ route('reports.index') }}">
                            <i class="fas fa-file-alt"></i>
                            <p>Report</p>
                        </a>
                    </li>
                @endcan

            </ul>
        </div>
    </div>
</div>
