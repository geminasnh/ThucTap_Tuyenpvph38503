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
            <li class="fw-medium">Sản phẩm</li>
        </ul>
    </div>

    <a href="{{route('sanpham.create')}}" class="btn btn-success my-2">Thêm sản phẩm</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tương tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listSanPham as $index => $sp)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$sp->ma_sp}}</td>
                <td>{{$sp->ten_sp}}</td>
                <td>{{$sp->gia}}</td>
                <td>{{$sp->so_luong}}</td>
                <td>{{$sp->ngay_nhap}}</td>
                <td>{{$sp->mo_ta}}</td>
                <td>{{$sp->trang_thai == 1 ? 'hieern thij' : 'Arrn' }}</td>
                <td style="width: 1px" class="text-nowrap">
                    <a href="" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i> Chi tiết</a>
                    <a href="" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i>Sửa</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>


@endsection
