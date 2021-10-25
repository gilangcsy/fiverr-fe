<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class={{ (Route::currentRouteName() == 'index') ? 'active' : ''}}><a class="nav-link" href="/seller"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Menu</li>
            <li class={{ (Route::currentRouteName() == 'services.index') ? 'active' : ''}}>
                <a class="nav-link" href="/seller/services">
                    <i class="fab fa-servicestack"></i>
                    <span>My Service</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fab fa-stripe-s"></i>
                    <span>My Transaction</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">History</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Order</a></li>
                </ul>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
