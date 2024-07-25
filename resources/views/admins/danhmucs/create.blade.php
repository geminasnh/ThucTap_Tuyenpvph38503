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

    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form action="{{route('danhmuc.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tên danh mục
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('ten_danh_muc') is-invalid @enderror"
                                           name="ten_danh_muc"
                                           placeholder="Nhập mã sản phẩm" value="{{old('ten_danh_muc')}}">
                                    @error('ten_danh_muc')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                               

                                <div class="text-center mt-3">
                                    <a href="{{route('danhmuc.index')}}" class="btn btn-light-100 text-dark "><i
                                            class="fa-solid fa-arrow-left"></i> Quay lại</a>
                                    <button type="reset" class="btn btn-warning-600 radius-8 ">Nhập lại</button>
                                    <button class="btn btn-success-600 radius-8 "><i class="fa-solid fa-plus"></i> Thêm
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


