@extends('layouts.client')

@section('css')

@endsection
@section('content')
    <div class="container ">

        <div class="row">

            <div class="col-12">
                <section class="mt-5">
                    <h2 class="mb-3 text-center">Đơn hàng {{ $donHang->ma_don_hang }}</h2>
                    <table class="table table-bordered ">
                        <thead>
                        <tr align="center">
                            <th scope="col">Ảnh</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donHang->chiTietDonHang as $item)
                            @php
                                $sanPham = $item->sanPham;
                            @endphp
                            <tr align="center">
                                <td>
                                    <div style="width: 70px; height: 70px"
                                         class="rounded border border-light overflow-hidden d-flex justify-content-center align-items-center">
                                        <img class="mh-100 mw-100" src="{{ \Illuminate\Support\Facades\Storage::url($sanPham->hinh_anh) }}">
                                    </div>
                                </td>
                                <td>{{ $sanPham->ma_sp }}</td>
                                <td> <b>{{ $sanPham->ten_san_pham }}</b>
                                <p>SL: {{$item->so_luong}}</p>
                                </td>
                                <td>{{ number_format( $item->don_gia,0,'','.') }} <i>vnđ</i></td>
                                <td>{{ number_format($item->thanh_tien,0,'','.')  }} <i>vnđ</i></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </section>
                <section class="mt-5">
                    <div class="d-flex justify-content-between pt-2">
                        <p class="fw-bold mb-0">Thông tin hóa đơn</p>
                        <p class="fw-bold text-danger mb-0">Trạng
                            thái: {{ $trangThaiDonHang[$donHang->trang_thai_don_hang] }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                        <p class="text-muted mb-0">Tên khách hàng: <span
                                    style="color: #53be72;">{{ $donHang->ten_nguoi_nhan }}</span>
                        </p>
                        <p class="text-muted mb-0"><span
                                    class="fw-bold me-4">Ngày tạo: {{ $donHang->created_at->format('d-m-Y') }}</span>
                        </p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">SDT: {{ $donHang->so_dien_thoai_nguoi_nhan }}</p>
                        <p class="text-muted mb-0"><span
                                    class="fw-bold">Trạng thái thanh toán: </span>{{$trangThaiThanhToan[$donHang->trang_thai_thanh_toan] }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">Địa chỉ: {{ $donHang->dia_chi_nguoi_nhan }}</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4">Tiền hàng:</span> <b
                                    class="text-danger">{{  number_format($donHang->tien_hang, 0, '', '.') }}</b> vnđ
                        </p>
                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <p class="text-muted mb-0">Email : {{ $donHang->email_nguoi_nhan }} </p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4">Phí vận chuyển: </span> <b
                                    class="text-danger">{{  number_format($donHang->tien_ship, 0, '', '.') }}</b> vnđ
                        </p>
                    </div>

                    <div class="border-0 px-4 py-4 rounded-bottom-4 "
                         style="background-color: #53be72;">

                        <div class="h2 fw-bold d-flex justify-content-center">
                            <span class="me-1">Tổng: </span>
                            <span class="text-danger me-1"> {{ number_format($donHang->tong_tien, 0, '', '.') }} </span>
                            <i>vnđ</i>
                        </div>


                    </div>
                </section>

                <div class="text-center px-4 py-5">
                    <h4 class="text-muted mb-0">Cảm ơn đã đặt hàng của chúng tôi, <span
                                style="color: #53be72;">{{ $donHang->ten_nguoi_nhan }}</span>!</h4>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('js')

@endsection


