<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}" href="/admin/posts">
                    <span data-feather="file"></span>
                    Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}" href="/admin/categories">
                    <span data-feather="folder-plus"></span>
                    Category
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/payment/method*') ? 'active' : '' }}"
                    href="{{ route('admin.payment.method') }}">
                    <i class="fa fa-money-bill"></i>
                    Payment Method
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/transaction*') ? 'active' : '' }}"
                    href="{{ route('admin.transaction.index') }}">
                    <i class="fa fa-paper-plane"></i>
                    Transaction
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/denda') ? 'active' : '' }}"
                    href="{{ route('admin.denda') }}">
                    <i class="fa fa-money-bill"></i>
                    Denda
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="/admin/users">
                    <span data-feather="users"></span>
                    Account
                </a>
        </ul>
    </div>
</nav>
