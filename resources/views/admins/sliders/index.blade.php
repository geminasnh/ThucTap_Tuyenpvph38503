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
            {{-- <li class="fw-medium">{{$title}}</li> --}}
        </ul>
    </div>{{--end title--}}


        @if(session('thongbao'))
        alert('{{ session('thongbao') }}');
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
                <a href="{{route('admins.user.create')}}" class="btn btn-sm btn-primary-600"><i class="ri-add-line"></i>
                    Thêm tài khoản</a>
            </div>
        </div>

        <div class="card-body" >
            <style>




            </style>
            <table class="table bordered-table mb-0" >
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hình ảnh</th>

                    <th scope="col">Mô tả</th>

                

                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slider as $index => $sl)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="#" alt="" class="flex-shrink-0 me-12 radius-8 me-12">
                                <div class="flex-grow-1">
                                    <h6 class="text-md mb-0 fw-normal">{{++$i}}</h6>
                                    <span class="text-sm text-secondary-light fw-normal">{{$sl->chuc_vu_id}}</span>
                                </div>
                            </div>
                        </td>
                   <td>     <img src="{{Storage::Url($sl->hinh_anh) }}" alt=""
                    style="width: 50px" class="flex-shrink-0 me-12 radius-8 me-12"></td>
                        <td>{{$sl->mo_ta}}</td>
                     

                        <td>
                            <form action="{{route('admins.slider.destroy', $sl->id)}}" method="POST">
                            
                                <a href="{{route('admins.slider.edit', $sl->id)}}" class="btn btn-warning btn-icon"><i class="fa-regular fa-pen-to-square"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon">
                                    <i class="fa-regular fa-trash-can"></i>
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
