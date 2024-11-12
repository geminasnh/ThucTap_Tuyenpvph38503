@extends('layouts.client')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4"> Tìm kiếm sản phẩm </h2>
        <div class="row">
            @forelse($sanPhams as $sanPham)
                <div class="col-3">
                    <div class="border hover-shadow mt-3 mb-3 rounded-2 overflow-hidden">
                        <div style="height: 259px"
                             class="overflow-hidden d-flex justify-content-center align-items-center">
                            <a href="{{ route('product.detail', ['id' => $sanPham->id]) }}"><img
                                    style="height: 230px; width: 230px" class="mw-100 mh-100"
                                    src="{{ asset('storage/' . $sanPham->hinh_anh) }}"></a>
                        </div>
                        <div class="m-2 text-center">
                            <h1 style="height: 48px" class="h5"><a
                                    class="fw-bold text-dark text-decoration-none"
                                    href="#">{{ $sanPham->ten_san_pham }}</a></h1>
                            <span class="fw-lighter fst-italic fs-6"> {{ $sanPham->danhMuc->ten_danh_muc ?? '' }} </span>
                            <div class="d-flex ms-3 justify-content-center">
                                <div
                                    class="me-2 fw-bolder"> {{ number_format($sanPham->gia_khuyen_mai) ? number_format($sanPham->gia_khuyen_mai) : number_format($sanPham->gia) }}
                                    vnđ
                                </div>
                                @if($sanPham->gia_khuyen_mai)
                                    <div style="font-size: 13px; color: #565e64"
                                         class="text-decoration-line-through pt-1 ">
                                        {{ number_format($sanPham->gia) }}
                                    </div>
                                @endif
                            </div>
                            <form method="POST" action="{{route('cart.add')}}">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
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
            @empty
                <div class="col-12">
                    <p>Không tìm thấy sản phẩm nào.</p>
                </div>
            @endforelse
        </div>
        {{ $sanPhams->links() }}
    </div>
@endsection
