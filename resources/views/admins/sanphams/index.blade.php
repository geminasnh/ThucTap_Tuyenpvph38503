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


        @if(session('thongbao'))
            <script>
            alert('{{ session('thongbao') }}');
            </script>
        @endif


    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span>Hiển thị</span>
                    <select class="form-select form-select-sm w-auto">
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                    </select>
                </div>
                <div class="icon-field">
                    <input type="text" name="#0" class="form-control form-control-sm w-auto" placeholder="Tìm kiếm">
                    <span class="icon">
              <iconify-icon icon="ion:search-outline"></iconify-icon>
            </span>
                </div>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-3">
                <select class="form-select form-select-sm w-auto">
                    <option selected>Chọn danh mục</option>
                    <option value="1">Hoa quả</option>
                    <option value="2">Rau</option>
                </select>
                <a href="{{route('admins.sanpham.create')}}" class="btn btn-sm btn-primary-600"><i
                        class="ri-add-line"></i>
                    Thêm sản phẩm</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0">
                <thead>
                <tr>
                    <th style="width: 5px">ID</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col" style="width: 250px">Sản phẩm</th>

                    <th scope="col">Giá (VNĐ)</th>

                    <th scope="col">Ngày nhập</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listProduct as $index => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->ma_sp}}</td>
                        <td >
                            <div class="d-flex align-items-center">
                                <img src="{{Storage::Url($item->hinh_anh) }}" alt=""
                                     style="width: 50px" class="flex-shrink-0 me-12 radius-8 me-12">
                                <div class="flex-grow-1">
                                    <h6 class="text-md mb-0 fw-normal fw-bold">{{$item->ten_san_pham}}</h6>
                                    <span class="text-sm text-secondary-light fw-normal">{{$item->danhMuc->ten_danh_muc}}</span>
                                    <p class="text-sm fw-bolder">SL: {{$item->so_luong}}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                         <span class="fw-bolder">{{number_format($item->gia)}}</span>
                        <p>Sale: {{empty(number_format($item->gia_khuyen_mai)) ? 0 : number_format($item->gia_khuyen_mai)}}</p>
                        </td>
                        {{--<td>{{empty($item->gia_khuyen_mai) ? 0 : number_format($item->gia_khuyen_mai)}}</td>--}}
                        <td>{{$item->ngay_nhap}}</td>
                        <td>
                            <span
                                class="{{$item->is_type == true ? 'bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm' : 'bg-danger-focus text-danger-main px-24 py-4 rounded-pill fw-medium text-sm'}}">
                            {{$item->is_type == true ? "Hiển thị" : "Ẩn"}}
                            </span>
                        </td>
                        <td class="text-nowrap">
                            <a href="{{route('admins.sanpham.show',$item->id)}}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                            <a href="{{route('admins.sanpham.edit',$item->id)}}"
                               class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <form method="POST" action="{{route('admins.sanpham.destroy', $item->id)}}"
                                  onsubmit="return confirm('Xác nhận xoá?')" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-24">
                <span>Hiển thị 1 tới 10 trên 12 trang</span>
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    <li class="page-item">
                        <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                           href="javascript:void(0)">
                            <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-600 text-white fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                           href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                           href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                           href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                           href="javascript:void(0)">
                            <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
