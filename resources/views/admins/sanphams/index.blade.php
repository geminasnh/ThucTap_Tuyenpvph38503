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

    <div class="table-responsive">
        <table class="table striped-table mb-0">
            <thead>
            <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">SL</th>
                <th scope="col">Giá</th>
                <th scope="col">Giá Sale</th>
                <th scope="col">Ngày nhập</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listProduct as $index => $sp)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="#" alt="" class="flex-shrink-0 me-12 radius-8 me-12">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-normal">{{$sp->ten_san_pham}}</h6>
                                <span class="text-sm text-secondary-light fw-normal">{{$sp->danh_muc_id}}</span>
                            </div>
                        </div>
                    </td>
                    <td>{{$sp->so_luong}}</td>
                    <td>{{$sp->gia}}</td>
                    <td>{{$sp->gia_khuyen_mai}}</td>
                    <td>{{$sp->ngay_nhap}}</td>
                    <td style="width: 527px">{{$sp->mo_ta}}</td>
                    <td>
                        <a href="#"
                           class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        <a href="#"
                           class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
