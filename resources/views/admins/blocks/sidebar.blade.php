<button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
</button>
<div>
    <a href="{{route('admins.dashboard')}}" class="sidebar-logo">
        <img src="{{ asset('img/lg4.png') }}" alt="site logo" class="light-logo">
    </a>
</div>
<div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
        <li class="dropdown">
            <a href="javascript:void(0)">
                <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                <span>Dashboard</span>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="#"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                        Thống kê</a>
                </li>
            </ul>
        </li>{{--Thong ke--}}

        <li class="sidebar-menu-group-title">Chức năng</li>

        <li class="dropdown">

            <a href="javascript:void(0)">
                <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                <span>Đơn hàng</span>
            </a>

            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admins.donhang.index')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Danh
                        sách</a>
                </li>
            </ul>

        </li>{{--Don hang--}}
        <li class="dropdown">
            <a href="javascript:void(0)">
                <iconify-icon icon="fluent-mdl2:product-release" class="menu-icon"></iconify-icon>
                <span>Sản phẩm</span>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admins.sanpham.index')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Danh sách</a>
                </li>
                <li>
                    <a href="{{route('admins.sanpham.create')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>Thêm</a>
                </li>

            </ul>
        </li>{{--San pham--}}
        <li class="dropdown">
            <a href="javascript:void(0)">
                <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
                <span>Danh mục</span>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admins.danhmuc.index')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Danh
                        sách</a>
                </li>
                <li>
                    <a href="{{route('admins.danhmuc.create')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                        Thêm</a>
                </li>
            </ul>
        </li>{{--Danh muc--}}

        <li class="dropdown">
            <a href="javascript:void(0)">
                <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                <span>Tài khoản</span>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="{{route('admins.user.index')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Danh
                        sách</a>
                </li>
                <li>
                    <a href="{{route('admins.user.create')}}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Thêm</a>
                </li>

            </ul>
        </li>{{--Tai khoan--}}


    </ul>
</div>

