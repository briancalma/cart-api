<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                <div class="profile-image">
                    <img src="{{ asset('images/faces-clipart/pic-1.png') }}" alt="profile image">
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">
                        {{ Auth::user()->firstname ." ". Auth::user()->lastname }}
                    </p>
                    <div>
                    <small class="designation text-muted">Manager / Admin</small>
                    <span class="status-indicator online"></span>
                    </div>
                </div>
                </div>
                <a class="btn btn-success btn-block" href="{{ url('products/create') }}">New Product
                    <i class="mdi mdi-plus"></i>
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- 
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="menu-icon mdi mdi-content-copy"></i>
                    <span class="menu-title">Basic UI Elements</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                    </li>
                    </ul>
                </div>
            </li> 
         --}}
        <li class="nav-item">
            <a class="nav-link" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic" data-toggle="collapse">
                <i class="menu-icon fa fa-tags"></i>
                <span class="menu-title">Products</span>
            </a>

            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products') }}">Product Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products/create') }}">Add New Product</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders" data-toggle="collapse">
                <i class="menu-icon fa fa-shopping-cart"></i>
                <span class="menu-title">Orders</span>
            </a>

            <div class="collapse" id="ui-orders">
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('transactions/create') }}">Add Transaction</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('transactions') }}">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('transactions/finished') }}">Finished Orders</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('reports') }}">
                <i class="menu-icon mdi mdi-elevation-rise"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li>
    </ul>
</nav>