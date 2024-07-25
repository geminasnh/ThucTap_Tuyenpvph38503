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
                
                <a href="{{route('danhmuc.create')}}" class="btn btn-sm btn-primary-600"><i class="ri-add-line"></i>
                    Thêm danh mục</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0">
                <thead>
                <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Tên danh mục</th>
                   
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->ten_danh_muc}}</td>
                        <td>
                            <a href="{{route('danhmuc.edit',$item->id)}}"
                               class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <form action="{{route('danhmuc.destroy',$item->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button onclick="return confirm('ban chắc chắn xóa')" type="submit"
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
