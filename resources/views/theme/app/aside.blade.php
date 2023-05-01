<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            @guest
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.dashboard') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.novel') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Novel</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.cerpen') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Cerpen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.komik') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Komik</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.ensiklopedia') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Ensiklopedia</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.biografi') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Biografi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.dongeng') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Dongeng</span>
                    </a>
                </li>
            @endguest
            @auth
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    @php
                    $role = '';
                    $dashboard = '';
                        if (Auth::User()->role=='user'){
                            $dashboard = route('web.dashboard');
                        } else {
                            $dashboard = route('admin.dashboard');
                        }
                    @endphp
                    <a class="nav-link menu-link" href="{{$dashboard}}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @can('User')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.novel') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Novel</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.cerpen') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Cerpen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.komik') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Komik</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.ensiklopedia') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Ensiklopedia</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.biografi') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Biografi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('web.books.dongeng') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Dongeng</span>
                    </a>
                </li>
                @elsecan('Admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.books.index') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-book-line"></i> <span data-key="t-books">Books</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.order.index') }}"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-shopping-bag-3-line"></i> <span data-key="t-books">Order</span>
                    </a>
                </li>
                @endcan
            </ul>
            @endauth
        </div>
    </div>
</div>