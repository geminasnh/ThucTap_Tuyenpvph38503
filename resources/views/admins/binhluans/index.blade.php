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
            <h5 class="card-title mb-0">Tables Border Colors</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bordered-table mb-0">
                    <thead>
                    <tr>
                        <th scope="col">Tài khoản</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Thời gian bình luận</th>
                        <th scope="col" class="text-center">Trạng thái bình luận</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dsBinhLuan as $index => $pt)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{--<img src="assets/images/users/user1.png" alt="" class="flex-shrink-0 me-12 radius-8">--}}
                                    <span class="text-lg text-secondary-light fw-semibold flex-grow-1">{{$pt->tai_khoan_id}}</span>
                                </div>
                            </td>
                            <td>{{$pt->san_pham_id}}</td>
                            <td>{{$pt->san_pham_id}}</td>
                            <td>{{$pt->noi_dung}}</td>
                            <td>{{$pt->thoi_gian}}</td>
                            <td class="text-center"> <span class="bg-danger-focus text-danger-main px-24 py-4 rounded-pill fw-medium text-sm">{{$pt->trang_thai_binh_luan_id}}</span> </td>
                            <td><a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a></td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
