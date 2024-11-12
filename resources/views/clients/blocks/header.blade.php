{{-- <div class="bg-success">
    @isset($thongTin) <!-- Kiểm tra nếu $thongTin đã được khởi tạo -->
        @php
            $firstThongTin = optional($thongTin)->first(); 
        @endphp

        @if($firstThongTin)  <!-- Kiểm tra nếu phần tử đầu tiên không phải null -->
            <div style="font-size: 15px;" class="container">
                <div class="d-flex justify-content-between" style="height: 42px;padding-top: 6px;">
                    <ul class="d-flex list-unstyled">
                        <li><a class="text-white text-decoration-none" href="#"><i class="fa-regular fa-envelope"></i>
                                {{ $firstThongTin->email ?? 'Email không có sẵn' }} | </a></li> <!-- Sử dụng optional() để tránh lỗi nếu email không tồn tại -->
                        <li class="ms-3"><a class="text-white text-decoration-none" href="#"> Miễn phí giao hàng nội thành</a></li>
                    </ul>

                    <ul class="d-flex list-unstyled">
                        <li><a href="#"><i class="fa fa-phone text-white text-decoration-none" aria-hidden="true"></i> <b
                                    class="text-white text-decoration-none">{{ $firstThongTin->phone_number ?? 'Không có số điện thoại' }} | </b></a></li>
                    </ul>

                    <!-- Nút Đăng xuất -->
                    <ul class="d-flex list-unstyled">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                    
                </div>
            </div>
        @endif
    @endisset

    <!-- Nếu người dùng chưa đăng nhập, hiển thị nút Đăng nhập -->
    @guest
        <div class="container">
            <ul class="d-flex justify-content-end list-unstyled">
                <li>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Đăng nhập</a>
                </li>
            </ul>
        </div>
    @endguest
</div> --}}


{{-- <div class="bg-success bg-success-fixed">
    @isset($thongTin)
        @php
            $firstThongTin = optional($thongTin)->first();
        @endphp

        @if($firstThongTin)
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <ul class="d-flex list-unstyled">
                        <li><a class="text-white text-decoration-none" href="#"><i class="fa-regular fa-envelope"></i>
                                {{ $firstThongTin->email ?? 'Email không có sẵn' }} | </a></li>
                        <li class="ms-3"><a class="text-white text-decoration-none" href="#"> Miễn phí giao hàng nội thành</a></li>
                    </ul>

                    <ul class="d-flex list-unstyled">
                        <li><a href="#"><i class="fa fa-phone text-white text-decoration-none" aria-hidden="true"></i> <b
                                    class="text-white text-decoration-none">{{ $firstThongTin->phone_number ?? 'Không có số điện thoại' }} | </b></a></li>
                    </ul>

                    <!-- Logout Button -->
                    <ul class="d-flex list-unstyled">
                        @auth
                        <ul class="d-flex list-unstyled">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light btn-sm">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                    </ul>
                </div>
            </div>
        @endif
    @endisset

    @guest
        <div class="container">
            <ul class="d-flex justify-content-end list-unstyled">
                <li>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Đăng nhập</a>
                </li>
            </ul>
        </div>
    @endguest

   
</div> --}}

 <!-- New Dropdown Section -->
    {{-- @auth
        <div class="dropdown-menu-wrapper">
            <div class="dropdown-header py-3 px-4 bg-primary-50 d-flex align-items-center justify-content-between gap-2 rounded-3">
                <div>
                    <h6 class="user-name text-lg text-primary-light fw-semibold mb-2">{{ Auth::user()->name }}</h6>
                    <span class="user-role text-secondary-light fw-medium text-sm">{{ Auth::user()->role }}</span>
                </div>
                <button type="button" class="close-dropdown hover-text-danger">
                    <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                </button>
            </div>
            <ul class="dropdown-list">
                <li>
                    <a class="dropdown-item text-black d-flex align-items-center gap-3 py-2" href="{{ route('profile.show') }}">
                        <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                        My Profile
                    </a>
                    
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item text-black d-flex align-items-center gap-3 py-2 hover-text-danger">
                            <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>
                            Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth --}}
    <header class="fs-5">
        <div style="font-size: 17px;" class="container">
            <nav class="navbar navbar-expand-sm p-3">
                <div class="container-fluid">
                    <!-- Logo -->
                    <ul class="navbar-nav">
                        @if($thongTin)
                            <li class="nav-item">
                                <a class="" href="{{ route('home') }}">
                                    {{-- <img src="{{asset('storage/' . $thongTin->logo)}}" width="135" height="40" alt="Logo"> --}}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <!-- Menu -->
                    <ul class="navbar-nav fw-bold">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{route('products')}}">Sản phẩm</a>
                            <ul class="dropdown-menu">
                                @foreach($danhMucs as $danhMuc)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('categories.show', $danhMuc->id) }}">
                                            {{ $danhMuc->ten_danh_muc }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('donhangs.index') }}">Đơn hàng</a>
                        </li>
                    </ul>
                    <!-- User, cart, search -->
                    <ul class="navbar-nav ms-auto"> <!-- Use ms-auto to push the items to the right -->
                        <li class="nav-item">
                            <div class="input-group">
                                <form action="{{ route('search') }}" method="GET" class="d-flex">
                                    <input type="text" name="query" class="form-control" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item ms-3">
                            <button class="btn position-relative nav-link">
                                <a href="{{route('cart.list')}}" class="text-decoration-none text-dark"><i
                                        class="fa-solid fa-cart-shopping "></i></a>
                                <span class="badge bg-danger rounded-pill position-absolute"
                                      style="top: -5px; right: -14px; font-size: 13px">{{ session('cart') ? count(session('cart')) : '0' }}</span>
                            </button>
                        </li>
    
                        <!-- Profile Dropdown -->
                        <li class="nav-item ms-3 dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                                    data-bs-toggle="dropdown">
                                <img src="{{ asset('img/1.jpg') ? asset('img/1.jpg') : (Auth::check() ? Auth::user()->anh_dai_dien : 'default-image.jpg') }}" alt="image"
                                     class="profile-img object-fit-cover rounded-circle">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end to-top dropdown-menu-sm">
                                <div class="py-2 px-3 radius-8 bg-primary-50 mb-2 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        @if(Auth::check())
                                            <h6 class="text-lg text-white fw-semibold mb-1">{{ Auth::user()->name }}</h6>
                                            <span class="text-white fw-medium text-sm">{{ Auth::user()->role }}</span>
                                        @else
                                            <h6 class="text-lg text-white fw-semibold mb-1">Guest</h6>
                                            <span class="text-white fw-medium text-sm">Not Logged In</span>
                                        @endif
                                    </div>
                                    <button type="button" class="hover-text-danger">
                                        <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                    </button>
                                </div>
                                <ul class="to-top-list">
                                    @if(Auth::check())
                                        <li>
                                            <a class="dropdown-item text-white px-0 py-2 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                               href="{{route('profile.show')}}">
                                                <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                                My Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-white px-0 py-2 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                               href="#">
                                                <iconify-icon icon="tabler:message-check" class="icon text-xl"></iconify-icon>
                                                Inbox</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-white px-0 py-2 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                               href="#">
                                                <iconify-icon icon="icon-park-outline:setting-two" class="icon text-xl"></iconify-icon>
                                                Setting</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-white px-0 py-2 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3">
                                                    <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>
                                                    Log Out</button>
                                            </form>
                                        </li>
                                    @else
                                        <li>
                                            <a class="dropdown-item text-white px-0 py-2 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                               href="{{ route('login') }}">
                                                <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                                Login</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-white px-0 py-2 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                               href="{{ route('register') }}">
                                               <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                                Register</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        
                        
                        
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    


