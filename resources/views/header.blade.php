<header>
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">TK Shoes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-1 fw-bold" href="{{ route('home') }}">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-1 fw-bold" href="{{ route('products') }}">SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-1 fw-bold" href="{{ route('about') }}">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-1 fw-bold" href="{{ route('contact') }}">LIÊN HỆ</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <i class="bi bi-search fs-4 text-black me-3" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#searchModal"></i>
                    </li>
                    <li class="nav-item">
                        <a class="fs-4 text-black me-3" href="{{ route('cart') }}">
                            <i class="bi bi-bag position-relative">
                                <span class="position-absolute top-100 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                                    @if (Session::has('cart'))
                                        {{sizeof(Session::get('cart'))}}
                                    @else
                                        0
                                    @endif

                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fs-4 text-black" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (!Auth::check())
                                <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                                <li><a class="dropdown-item" href="#">Quên mật khẩu</a></li>
                            @else
                                <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders') }}">Đơn hàng</a></li>
                                <li><a class="dropdown-item" href="{{ route('changepasswordform') }}">Đổi mật khẩu</a></li>
                                <li><hr class="dropdown-divider"></li>
                                @if (Auth::user()->role === 1)
                                    <li><a class="dropdown-item" href="{{route('admin_dashboard')}}">Trang quản trị</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal Search-->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body row">
                <form class="col-10 ps-4 d-flex justify-content-between w-100" action="{{ route('search') }}" method="POST">
                    @csrf
                    <input id="searchInput" name="keyword_submit" class="form-control" type="text" placeholder="Nội dung tìm kiếm...">
                    <input type="submit" class="btn btn-outline-primary ms-2" value="Tìm kiếm">
                </form>
                {{-- <i type="submit" class="bi bi-search enterSearch col-2 fs-3 text-black text-end pe-4" style="cursor: pointer;"></i> --}}
            </div>
        </div>
        </div>
    </div>
    <!-- Modal Search End Code-->
</header>