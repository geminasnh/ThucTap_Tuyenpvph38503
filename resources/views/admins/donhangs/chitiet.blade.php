@extends('layouts.admin')

@section('content')

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">{{$title}}</li>
        </ul>
    </div>{{--end title--}}

    <script>
        @if(session('thongbao'))
        alert('{{ session('thongbao') }}');
        @endif
    </script>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="javascript:void(0)"
                   class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
                    Gửi hóa đơn
                </a>
                <a href="javascript:void(0)"
                   class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                    Tải xuống
                </a>
                <button type="button" class="btn btn-sm btn-danger radius-8 d-inline-flex align-items-center gap-1"
                        onclick="printInvoice()">
                    <iconify-icon icon="basil:printer-outline" class="text-xl"></iconify-icon>
                    Máy in
                </button>
            </div>
        </div>
        <div class="card-body py-40">
            <div class="row justify-content-center" id="invoice">
                <div class="col-lg-10">
                    <div class="shadow-4 border radius-8">
                        <div class="p-20 border-bottom">
                            <div class="row justify-content-between g-3">
                                <div class="col-sm-4">
                                    <h3 class="text-xl">Hóa đơn #3492</h3>
                                    <p class="mb-1 text-sm">Tài khoản: <span
                                            class="editable text-decoration-underline">{{ $donHang->user->name }}</span></p>
                                    <p class="mb-1 text-sm">Email: <span
                                            class="editable text-decoration-underline">{{ $donHang->user->email }}</span></p>
                                    <p class="mb-1 text-sm">Số điện thoại: <span
                                            class="editable text-decoration-underline">{{ $donHang->user->so_dien_thoai }}</span></p>
                                    <p class="mb-1 text-sm">Địa chỉ: <span
                                            class="editable text-decoration-underline">{{ $donHang->user->dia_chi }}</span></p>
                                    <p class="mb-1 text-sm">Role: <span
                                            class="editable text-decoration-underline">{{ $donHang->user->role }}</span></p>
                                </div>
                                <div class="col-sm-4">
                                    <img src="{{asset('/img/1.jpg')}}" width="50px" alt="image" class="mb-8">
                                    <p class="mb-1 text-sm">28 Liễu Giai, Ba Đình, Hà Nội</p>
                                    <p class="mb-1 text-sm">tuyenpv2004@gmail.com 0354830486</p>
                                    <p class="mb-1 text-sm">Ngày tạo: <span class="editable text-decoration-underline">{{ $donHang->created_at }}</span>
                                    </p>
                                    <p class="mb-1 text-sm">Ngày cập nhật: <span
                                            class="editable text-decoration-underline">{{ $donHang->updated_at }}</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="py-28 px-20">
                            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                                <div>
                                    <h6 class="text-md">Khách hàng:</h6>
                                    <table class="text-sm text-secondary-light">
                                        <tbody>
                                        <tr>
                                            <td>Tên người nhận:</td>
                                            <td class="ps-8">: <span
                                                    class="editable text-decoration-underline">{{ $donHang->ten_nguoi_nhan }}</span> <span
                                                    class="text-success-main"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td class="ps-8">: <span class="editable text-decoration-underline">{{ $donHang->dia_chi_nguoi_nhan }}</span>
                                                <span class="text-success-main"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td class="ps-8">: <span class="editable text-decoration-underline">{{ $donHang->so_dien_thoai_nguoi_nhan }}</span>
                                                <span class="text-success-main"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td class="ps-8">: <span class="editable text-decoration-underline">{{ $donHang->email_nguoi_nhan }}</span>
                                                <span class="text-success-main"></span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <table class="text-sm text-secondary-light">
                                        <tbody>

                                        <tr>
                                            <td class="fw-bold">Mã đơn hàng</td>
                                            <td class="ps-8 fw-bold">: {{ $donHang->ma_don_hang  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái đơn hàng</td>
                                            <td class="ps-8">: {{ $trangThaiDonHang[$donHang->trang_thai_don_hang] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phương thức thanh toán</td>
                                            <td class="ps-8">: {{ $trangThaiThanhToan[$donHang->trang_thai_thanh_toan] }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-24">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table text-sm" id="invoice-table">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-sm">Ảnh</th>
                                            <th scope="col" class="text-sm">Mã sản phẩm</th>
                                            <th scope="col" class="text-sm">Sản phẩm</th>
                                            <th scope="col" class="text-sm">SL</th>
                                            <th scope="col" class="text-sm">Giá</th>
                                            <th scope="col" class="text-sm">Thành Tiền</th>
                                            <th scope="col" class="text-center text-sm">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($donHang->chiTietDonHang as $item)
                                            @php
                                                $sanPham = $item->sanPham;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div style="width: 40px; height: 40px"
                                                         class="rounded border border-light overflow-hidden d-flex justify-content-center align-items-center">
                                                        <img class="mh-100 mw-100"
                                                             src="{{ \Illuminate\Support\Facades\Storage::url($sanPham->hinh_anh) }}">
                                                    </div>
                                                </td>
                                                <td>{{ $sanPham->ma_sp }}</td>
                                                <td>{{ $sanPham->ten_san_pham }}</td>
                                                <td>{{$item->so_luong}}</td>
                                                <td>{{ number_format( $item->don_gia,0,'','.') }} <i>vnđ</i></td>
                                                <td>{{ number_format($item->thanh_tien,0,'','.')  }} <i>vnđ</i></td>
                                                <td class="text-center">
                                                    <button type="button" class="remove-row">
                                                        <iconify-icon icon="ic:twotone-close"
                                                                      class="text-danger-main text-xl"></iconify-icon>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                           
                                <div class="d-flex flex-wrap justify-content-between gap-3 mt-24">
                                    <div>
                                        <p class="text-sm mb-0"><span
                                                class="text-primary-light fw-semibold">Người bán:</span> {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                        <p class="text-sm mb-0">Cảm ơn vì đã được phục vụ bạn!</p>
                                    </div>
                                    <div>
                                        <table class="text-sm">
                                            <tbody>
                                            <tr>
                                                <td class="pe-64">Tổng tiền:</td>
                                                <td class="pe-16">
                                                    <span class="text-primary-light fw-semibold">{{ number_format($donHang->tien_hang) }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pe-64 border-bottom pb-4">Phí Ship:</td>
                                                <td class="pe-16 border-bottom pb-4">
                                                    <span class="text-primary-light fw-semibold">{{ number_format($donHang->tien_ship) }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pe-64">Giảm giá:</td>
                                                <td class="pe-16">
                                                    <span class="text-primary-light fw-semibold">0</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="pe-64 pt-4">
                                                    <span class="text-primary-light fw-semibold">Thành tiền:</span>
                                                </td>
                                                <td class="pe-16 pt-4">
                                                    <span class="text-primary-light fw-semibold">{{ number_format($donHang->tong_tien) }}</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-64">
                                <p class="text-center text-secondary-light text-sm fw-semibold">Cảm ơn vì đã mua hàng
                                    của chúng tôi!</p>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
                                <div class="text-sm border-top d-inline-block px-12">Ký tên bởi khách hàng</div>
                                <div class="text-sm border-top d-inline-block px-12">Ký tên bởi người bán</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
