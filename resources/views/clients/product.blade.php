@extends('layouts.client')
@section('css')

@endsection
@section('content')
    <div style="min-height: calc(100vh - 488px);">
        <!-- Slide show -->
        <section>
            <div id="slideshow" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    @foreach($listSlider as $key => $slider)
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="{{ $key }}"
                                class="{{ $key == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    @foreach($listSlider as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $slider->hinh_anh) }}" alt="Slide {{ $key }}"
                                 class="d-block w-100" style="max-height: 400px; width: 100%; height: auto;">
                            <div class="carousel-caption">
                                <div class="text-start">
                                    <i class="text-dark fw-lighter fst-italic">{{ $slider->mo_ta }}</i>
                                   
                               
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </section>

        <!--San phẩm mới-->
        <section>
            <div class="container">
                <div class="fw-bold pt-2 text-center" style="font-size: 71px;">
                    <i style="color: #7faf51;">Giày đẹp</i>
                </div>
                <div class="mt-2 mb-4 text-center">
                    <span>Sản phẩm tốt nhất dành cho bạn</span>
                    <h3 class="fw-bold ">Sản phẩm mới</h3>
                </div>

                <!--layout sp moi-->

                <div class="row">
                    @foreach($listSanPham as $sp)
                        <div class="col-3 ">
                            <div class="border hover-shadow mt-3 mb-3 rounded-2 overflow-hidden">
                                <div style="height: 259px"
                                     class=" overflow-hidden d-flex justify-content-center align-items-center">
                                    <a href="{{ route('product.detail', ['id' => $sp->id]) }}"><img
                                            style="height: 230px; width: 230px" class="mw-100 mh-100"
                                            src="{{Storage::url($sp->hinh_anh) }}"></a>
                                </div>
                                <div class="m-2 text-center">
                                    <h1 style="height: 48px" class="h5"><a
                                            class="fw-bold text-dark text-decoration-none"
                                            href="{{ route('product.detail', ['id' => $sp->id]) }}">{{ $sp->ten_san_pham }}</a></h1>
                                    <span class="fw-lighter fst-italic fs-6"> {{ $sp->danhMuc->ten_danh_muc }} </span>
                                    <div class="d-flex ms-3 justify-content-center">
                                        <div
                                            class="me-2 fw-bolder"> {{ number_format($sp->gia_khuyen_mai) ? number_format($sp->gia_khuyen_mai) : number_format($sp->gia) }}
                                            vnđ
                                        </div>
                                        @if($sp->gia_khuyen_mai)
                                            <div style="font-size: 13px; color: #565e64"
                                                 class="text-decoration-line-through pt-1 ">
                                                {{ number_format($sp->gia) }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{{route('cart.add')}}">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product_id" value="{{ $sp->id }}">
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-success rounded-5"><i
                                                    class="fa-solid fa-cart-shopping"></i> Thêm
                                                giỏ
                                                hàng
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>


            </div>
        </section>

        <!--Hot and Sale-->
        <section>
            <div class="container">
                <div class="row mt-3">
                    <!--Sản phẩm Sale-->
                  

                    <!--Sản phẩm Hot-->
                    <div class="row">
                        <h3 class="fw-bold">Sản phẩm yêu thích </h3>
                        <!-- Carousel -->
                        <div class="row">
                            @foreach ($sanPhamYeuThich as $sanPham)
                                <div class="col-md-6 mb-4">
                                    <div style="height: 200px; width: 100%;" class="d-flex border border-lighter rounded-2 hover-shadow p-1">
                                        <!-- IMG hot -->
                                        <div style="height: 150px; width: 150px; margin-top: 15px">
                                            <a href="{{ route('product.detail', ['id' => $sanPham->id]) }}">
                                                <img src="{{Storage::url($sanPham->hinh_anh) }}" class="mw-100 mh-100">
                                            </a>
                                        </div>
                                        <!-- info -->
                                        <div class="mt-4 ms-3">
                                            <span style="font-size: 13px" class="fw-lighter fst-italic">{{ $sanPham->danhMuc->ten_danh_muc }}</span><br>
                                            <a href="{{ route('product.detail', ['id' => $sanPham->id]) }}" class="text-dark fw-bolder text-decoration-none fs-6">{{ $sanPham->ten_san_pham }}</a><br>
                                            <ins style="font-size: 15px" class="text-decoration-none text-dark">
                                                <span>Giá: {{ number_format($sanPham->gia_khuyen_mai) ? number_format($sanPham->gia_khuyen_mai) : number_format($sanPham->gia) }} vnđ</span>
                                            </ins>
                                            <p style="font-size: 13px">
                                                <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                (0 đánh giá)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination links -->
                        <div class="d-flex justify-content-end">
                            {{ $sanPhamYeuThich->links('pagination::bootstrap-5') }}
                        </div>

                        <!--banner small-->
                        <!-- Carousel -->
                        <div id="banner" class="carousel slide" data-bs-ride="carousel">
                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active mt-4">
                                    <img src=" {{ asset('img/2131.jpg') }}" alt="Los Angeles" class="d-block"
                                         style="width:100%">
                                    <div style="margin-right: -60px; margin-bottom: -7px"
                                         class="carousel-caption text-end text-dark">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!--banner-->
        <section>
            <div class="container-fluid mt-5 bg-light">
                <div class="container">
                    <div style="height: 100px; ">
                        <ul style="height: 100px; align-items: center"
                            class="d-flex border justify-content-around list-unstyled">
                            <li>
                                <div class="text-center fs-5">
                                    <i class="fa-solid fa-ranking-star"></i><br>
                                    <span>Đảm bảo chất lượng</span>
                                </div>
                            </li>
                            |
                            <li>
                                <div class=" text-center fs-5">
                                    <i class="fa-solid fa-calendar-days"></i><br>
                                    <span>Giao hàng đúng hẹn</span>
                                </div>
                            </li>
                            |
                            <li>
                                <div class=" text-center fs-5">
                                    <i class="fa-solid fa-truck"></i><br>
                                    <span>Miến phí giao hàng nội thành</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('js')

@endsection
