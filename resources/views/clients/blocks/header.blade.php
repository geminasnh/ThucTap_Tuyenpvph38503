<!--info-->
<div class="bg-success">
    <div style="font-size: 15px;" class="container">
        <div class="d-flex justify-content-between " style="height: 42px;padding-top: 6px;">
            <ul class="d-flex list-unstyled">
                <li><a class="text-white text-decoration-none" href="#"><i class="fa-regular fa-envelope"></i>
                        andpph31859@fpt.edu.vn | </a></li>
                <li class="ms-3"><a class="text-white text-decoration-none" href="#"> Miễn phí giao hàng nội thành</a>
                </li>
            </ul>

            <ul class="d-flex list-unstyled">
                <li><a href="#"><i class="fa fa-phone text-white text-decoration-none" aria-hidden="true"></i> <b
                            class="text-white text-decoration-none">0987654321 | </b></a>
                </li>
                <li><a href="{{route('donhangs.index')}}"> <b
                            class="text-white text-decoration-none ms-1">My Order | </b></a>
                </li>
                <li class="ms-3"><a class="text-white text-decoration-none" href="#"><i class="fa-solid fa-user"></i>
                        Đăng nhập</a></li>
            </ul>
        </div>
    </div>

</div>
<header class="fs-5">
    <div style="font-size: 17px;" class="container">
        <nav class="navbar navbar-expand-sm p-3">

            <div class="container-fluid">
                <!-- Logo -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="" href="#">
                            <img src="{{asset('img/logo3.png')}}" width="135" height="40" alt="Logo">
                        </a>
                    </li>
                </ul>
                <!-- Menu -->
                <ul class="navbar-nav fw-bold">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Danh mục</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Danh mục 1</a></li>
                            <li><a class="dropdown-item" href="#">Danh mục 2</a></li>
                            <li><a class="dropdown-item" href="#">Danh mục 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
                <!-- User, cart, search -->
                <ul class="navbar-nav">
                    <li class="nav-item">

                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="Tim kiếm..."
                                   aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>

                    </li>
                    <li class="nav-item ms-3">
                        <button class="btn position-relative nav-link">
                            <a href="{{route('cart.list')}}" class="text-decoration-none text-dark"><i class="fa-solid fa-cart-shopping "></i></a>
                            <span class="badge bg-danger rounded-pill position-absolute"
                                  style="top: -5px; right: -14px; font-size: 13px">{{ session('cart') ? count(session('cart')) : '0' }}</span>
                        </button>
                    </li>

                </ul>
            </div>

        </nav>
    </div>
</header>
