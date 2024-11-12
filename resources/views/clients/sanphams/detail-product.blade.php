@extends('layouts.client')

@section('css')

@endsection
@section('content')
    <div style="min-height: calc(100vh - 488px);">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <!--Chi tiết sản phẩm-->
        <section>
            <!--Link-->
            <div class="container">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
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
                        <a class="nav-link disabled" href="#" tabindex="-1"
                           aria-disabled="true">{{$sanPham->ten_san_pham}}</a>
                    </li>
                </ul>
            </div>

            <!--Chi tiết sản phẩm-->
            <div class="container">
                <!--thoong tin san pham-->
                <div class="row mt-3">
                    <div class="col-3">
                        <div class="d-flex ">
                            <div style="width: 70px; height: 70px;">
                                @foreach($sanPham->hinhAnhSanPham as $item)
                                    <img class="mw-100 mh-100 border" style="margin-bottom: 6px"
                                         src="{{Storage::url($item->hinh_anh)}}" alt="">
                                @endforeach
                            </div>
                            <div style="height: 290px" class="border ms-2">
                                <img class="mw-100 mh-100" src="{{Storage::url($sanPham->hinh_anh)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <p><span class="h3 fw-bolder mb-3">{{$sanPham->ten_san_pham}}</span></p>
                            <div class="mb-3">
                                @if($sanPham->gia_khuyen_mai)
                                    <span class="h3 me-2">Giá: <b>{{ number_format($sanPham->gia_khuyen_mai) }}</b> vnđ</span>
                                    <span
                                        class="text-decoration-line-through">gốc: <b>{{ number_format($sanPham->gia) }}</b> vnđ</span>
                                @else
                                    <span class="h3 me-2">Giá: <b>{{ number_format($sanPham->gia) }}</b> vnđ</span>
                                @endif
                            </div>
                            <span>Danh mục: </span><span class="fw-bolder"> {{$sanPham->danhMuc->ten_danh_muc}} </span>
                            <div style="font-size: 13px" class="d-flex mb-3">
                                <span>ID: <b>{{$sanPham->id}}</b></span>
                                <span class="mx-5">Số lượng còn lại: <b>{{$sanPham->so_luong}}</b>  </span>
                                <div>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <span class="review-count">({{$tongBinhLuan}} Đánh giá)</span>
                                </div>
                            </div>


                            <div class="mt-2">
                                <span style="color: green">Free ship Hà Nội, Hồ Chí Minh</span><br>
                                <span class="text-uppercase">{{$sanPham->mo_ta_ngan}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">

                        <div class="bg-light p-2 px-4 border rounded-3 shadow">
                            <h1 class="h5 my-2">Chọn loại sản phẩm</h1>
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

                            <form action="{{route('cart.add')}}" method="POST">
                                @csrf
                                <div class="input-group input-group-sm my-3 ">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Số lượng</span>

                                    <span class="giam qtybtn btn btn-outline-secondary">-</span>
                                    <input type="number" name="quantity" class="form-control text-center"
                                           id="quantityInput" value="1"
                                           aria-label="Quantity" aria-describedby="inputGroup-sizing-sm">
                                    <span class="tang qtybtn btn btn-outline-secondary">+</span>

                                    <input type="hidden" name="product_id" value="{{$sanPham->id}}">
                                </div>


                                <div class="text-center mt-3 border-top pt-2">
                                    <button type="submit" class="btn btn-success w-100 rounded-pill">Thêm vào giỏ hàng
                                    </button>
                                    <br>
                                    <button type="submit" class="btn btn-primary my-2 w-100 rounded-pill">Mua ngay
                                    </button>
                                </div>

                            </form>

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

                <div class="accordion my-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                Thông tin chung
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                             aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                {{$sanPham->mo_ta_ngan}}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                Mô tả chi tiết
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                             aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                {{@$sanPham->noi_dung}}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                Danh sách bình luận
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                             aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                    @foreach($listBinhLuan as $index => $comment)
                                        <div class="d-flex justify-content-between w-75">
                                                            <span><strong>{{ $comment->nguoiDung->name}}</strong>:
                                                            {{ $comment->noi_dung }}</span>
                                            <span>Ngày bình luận: {{ $comment->thoi_gian }}</span>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="h5 text-center">Bình luận</h1>
                    @auth
                        <form action="{{ route('binhluan.store') }}" method="POST" class="text-center">
                            @csrf
                            <input type="hidden" name="san_pham_id" value="{{ $sanPham->id }}">
                            <textarea name="noi_dung" class="form-control w-50 mx-auto" rows="3" placeholder="Nhập bình luận của bạn"></textarea>
                            <button type="submit" class="btn btn-secondary mt-2">Gửi bình luận</button>
                        </form>
                    @endauth
                    @guest
                        <p class="text-center">Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để bình luận.</p>
                    @endguest
                </div>
                @if(session('success'))
                    <script>
                        alert('{{ session('success') }}');
                    </script>
                @endif
            </div>
        </section>
        <!--san phẩm liên quan-->
        <section>
            <div class="container">
                <h3 class="fw-bold my-4 text-center">Sản phẩm liên quan</h3>

                <div class="row">
                    @foreach($listSanPham as $sp)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <!-- IMG -->
                                <a class="px-5 py-5" href="{{ route('product.detail', ['id' => $sp->id]) }}"
                                   style="height: 300px">
                                    <img src="{{Storage::url($sp->hinh_anh) }}"
                                         class="card-img mw-100 mh-100" alt="{{ $sp->ten_san_pham }}">
                                </a>
                                <div class="card-body text-center border-top">
                                    <span class="fw-lighter fst-italic fs-6">{{ $sp->danhMuc->ten_danh_muc }}</span>
                                    <br>
                                    <a href="{{ route('product.detail', ['id' => $sp->id]) }}"
                                       class="fw-bold text-dark text-decoration-none fs-5">{{ $sp->ten_san_pham }}</a><br>
                                    <ins class="text-decoration-none fw-bold text-dark">
                                        <span>Giá: {{ number_format($sp->gia_khuyen_mai) ? number_format($sp->gia_khuyen_mai) : number_format($sp->gia) }} vnđ</span>
                                    </ins>
                                    @if($sp->gia_khuyen_mai)
                                        <p class="text-decoration-line-through">Giá gốc: {{ number_format($sp->gia) }}
                                            vnđ</p>
                                    @endif
                                </div>
                                <form method="POST" action="{{route('cart.add')}}">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value="{{ $sp->id }}">
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-success rounded-5"><i class="fa-solid fa-cart-shopping"></i> Thêm
                                            giỏ
                                            hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Phân trang -->
                <div class="d-flex justify-content-center">
                    {{ $listSanPham->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </section>

    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.giam').on('click', function () {
                var $input = $('#quantityInput');
                var value = parseInt($input.val());
                if (value > 1) {
                    $input.val(value - 1);
                }
            });

            $('.tang').on('click', function () {
                var $input = $('#quantityInput');
                var value = parseInt($input.val());
                $input.val(value + 1);
            });

            $('#quantityInput').on('change', function () {
                var value = parseInt($(this).val(), 10);

                if (isNaN(value) || value < 1) {
                    alert('Số lượng phải lớn hơn 1');
                    $(this).val(1);
                }

            });
        });

    </script>
@endsection


