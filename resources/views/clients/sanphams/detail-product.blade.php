@extends('layouts.client')

@section('css')

@endsection
@section('content')
    <div style="min-height: calc(100vh - 488px);">
        <!--Chi tiết sản phẩm-->
        <section>
            <!--Link-->
            <div class="container">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">/</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{$sanPham->danhMuc->ten_danh_muc}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">/</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{$sanPham->ten_san_pham}}</a>
                    </li>
                </ul>
            </div>

            <!--Chi tiết sản phẩm-->
            <div class="container">
                <!--thoong tin san pham-->
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="d-flex ">

                            <div style="width: 90px; height: 90px">
                                @foreach($sanPham->hinhAnhSanPham as $item)
                                    <img class="mw-100 mh-100 border"
                                         src="{{Storage::url($item->hinh_anh)}}" alt="">
                                @endforeach
                            </div>

                            <div style="width: 280px; height: 280px" class="border ms-2">
                                <img class="mw-100 mh-100" src="{{Storage::url($sanPham->hinh_anh)}}" alt="">
                            </div>


                        </div>

                    </div>
                    <div class="col-5">
                        <div>
                            <h1 class="h3 fw-bolder"> Sản phẩm 1 </h1>
                            <div style="font-size: 13px" class="d-flex justify-content-between">
                                <div>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <span class="review-count">(04 Đánh giá)</span>
                                </div>
                                <span class="qa-text">Q&A</span>
                                <span class="me-4">ID: <b>12</b></span>
                            </div>
                            <span>Danh mục: </span><span class="fw-bolder"> Danh mục 1 </span><br>
                            <span class="stock">Số lượng còn lại: <b>22</b>  </span>

                            <div class="mt-3 mb-3 justify-content-between d-flex align-items-center">
                                <span class="h3 ">Giá: <b>100.000</b> vnđ</span>
                                <span class="text-decoration-line-through">gốc: <b>100.000</b> vnđ</span>
                            </div>

                            <div>
                                <span style="color: green">Free ship Hà Nội, Hồ Chí Minh</span><br>
                                <span class="text-uppercase">Đặt hàng giao ngay</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">

                        <div class="bg-light p-2 px-4 border rounded-3 shadow">
                            <h1 class="h5">Chọn loại sản phẩm</h1>
                            <div style="font-size: 13px">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                           id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nhập khẩu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                           id="flexRadioDefault2"
                                           checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Chính hãng
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="input-group input-group-sm mb-3 ">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"> Số lượng</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                           aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>


                            <div class="text-center mt-3 border-top pt-2">
                                <button class="btn btn-success w-100 rounded-pill">Thêm vào giỏ hàng</button>
                                <br>
                                <button class="btn btn-primary mt-1 w-100 rounded-pill">Mua ngay</button>
                            </div>
                            <div class="fs-5 my-2 d-flex justify-content-center">
                                <i class="fa-solid fa-share-from-square me-3"></i>
                                <i class="fa-brands fa-facebook me-3"></i>
                                <i class="fa-brands fa-twitter me-3"></i>
                                <i class="fa-brands fa-google-plus-g me-3 "></i>
                                <i class="fa-regular fa-envelope"></i>
                            </div>


                        </div>

                    </div>
                </div>
                <!--Chi tiet san pham-->
                <div class="my-4 d-flex">
                    <div class="accordion w-75" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    Thông tin chi tiết
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi asperiores
                                    atque blanditiis doloremque, ea expedita impedit incidunt inventore iure officia
                                    omnis,
                                    provident ratione rerum unde vel, velit voluptas voluptatem.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                    Chính sách bảo hành
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> Lorem ipsum dolor sit
                                    amet,
                                    consectetur adipisicing elit. Accusamus animi asperiores
                                    atque blanditiis doloremque, ea expedita impedit incidunt inventore iure officia
                                    omnis,
                                    provident ratione rerum unde vel, velit voluptas voluptatem.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                    Hướng dẫn mua hàng
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> Lorem ipsum dolor sit
                                    amet,
                                    consectetur adipisicing elit. Accusamus animi asperiores
                                    atque blanditiis doloremque, ea expedita impedit incidunt inventore iure officia
                                    omnis,
                                    provident ratione rerum unde vel, velit voluptas voluptatem.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-25 ms-3 ">
                        <h1 class="h5 text-center">Bình luận</h1>
                        <div class="text-center">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <button class="btn btn-secondary w-25 mt-2">Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--san phẩm liên quan-->
        <section>
            <div class="container">

                <h3 class="fw-bold my-4">Sản phẩm liên quan </h3>


                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-between">
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between">
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between">
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div style="height: 300px; width: 250px;" class="border border-success p-3">
                                    <!--IMG sale-->
                                    <div style="height: 150px; width: 150px; margin-left: 30px">
                                        <a href="#">
                                            <img src="/img/1701700816tao-koru-my.jpg" class="mw-100 mh-100">
                                        </a>
                                    </div>

                                    <div style="height: 280px" class=" text-center">
                                        <span class="fw-lighter fst-italic fs-6"> Danh mục 1 </span> <br>
                                        <a href="#" class="fw-bold text-dark text-decoration-none fs-5"> Sản phẩm 1 </a><br>
                                        <ins class="text-decoration-none fw-bold text-dark">
                                            <span>Giá: 300.000 vnđ</span>
                                        </ins>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque
                                            debitis dolor earum hic optio placeat possimus quisquam similique. At
                                            consequatur ea molestias nam obcaecati odio odit voluptatem? Delectus,
                                            itaque.</p>
                                    </div>

                                    <div class="container-fluid text-center">
                                        <a class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ hàng</a>
                                        <a class="btn btn-primary">Mua ngay <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('js')

@endsection


