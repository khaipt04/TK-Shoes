<aside class="bg-dark" id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="bi bi-grid-fill"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">TK Shoes</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{ route('admin_dashboard') }}" class="sidebar-link d-flex align-items-center">
                <i class="bi bi-speedometer"></i>
                <span>Tổng quan</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin_products') }}" class="sidebar-link d-flex align-items-center">
                <i class="bi bi-database-dash"></i>
                <span>Sản phẩm</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin_category') }}" class="sidebar-link d-flex align-items-center">
                <i class="bi bi-view-list"></i>
                <span>Danh mục</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin_order') }}" class="sidebar-link d-flex align-items-center">
                <i class="bi bi-bag-dash"></i>
                <span>Đơn hàng</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin_user') }}" class="sidebar-link d-flex align-items-center">
                <i class="bi bi-people"></i>
                <span>Người dùng</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>Đăng xuất</span>
            </a>
        </li>
    </ul>
</aside>
<div class="main bg-body-secondary">
    <nav class="navbar navbar-expand px-4 py-3">
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="" class="nav-icon pe-md-0">
                        <img src="{{ asset('img/avt/avt_user_default.jpg') }}" class="avatar img-fluid rounded-5" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </nav>