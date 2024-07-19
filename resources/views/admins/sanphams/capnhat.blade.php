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
                            <form action="{{route('sanpham.update', $chiTietSp->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body p-24">
                                    <h6 class="text-md text-primary-light mb-16">Ảnh sản phẩm</h6>
                                    <label for="file-upload" class="mb-16 border border-neutral-600 fw-medium
                                    text-secondary-light px-16 py-12 radius-12 d-inline-flex align-items-center gap-2 bg-hover-neutral-200">
                                        <iconify-icon icon="solar:upload-linear" class="text-xl"></iconify-icon>
                                        Tải ảnh lên
                                        <input type="file" class="form-control w-auto mt-24 form-control-lg"
                                               id="file-upload"
                                               name="hinh_anh" onchange="showImg(event)" hidden>
                                    </label>
                                    <img
                                        src="{{ empty($chiTietSp->hinh_anh) ? '' : \Illuminate\Support\Facades\Storage::url($chiTietSp->hinh_anh) }}"
                                        id="uploaded-img" style=" width: 150px">
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mã sản phẩm
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('ma_sp') is-invalid @enderror"
                                           name="ma_sp"
                                           placeholder="Nhập mã sản phẩm" value="{{ $chiTietSp->ma_sp }}">
                                    @error('ma_sp')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tên sản phẩm
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('ten_san_pham') is-invalid @enderror"
                                           name="ten_san_pham"
                                           placeholder="Nhập tên sản phẩm" value="{{ $chiTietSp->ten_san_pham }}">
                                    @error('ten_san_pham')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Số lượng <span
                                            class="text-danger-600">*</span></label>
                                    <input type="text"
                                           class="form-control radius-8 @error('so_luong') is-invalid @enderror"
                                           name="so_luong"
                                           placeholder="Nhập số lượng" value="{{ $chiTietSp->so_luong }}">
                                    @error('so_luong')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Giá
                                        gốc <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8 @error('gia') is-invalid @enderror"
                                           name="gia"
                                           placeholder="Nhập giá tiền sản phẩm" value="{{ $chiTietSp->gia }}">
                                    @error('gia')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Giá khuyến mãi
                                    </label>
                                    <input type="text" class="form-control radius-8" name="gia_khuyen_mai"
                                           placeholder="Nhập giá khuyến mãi sản phẩm" value="{{ $chiTietSp->gia_khuyen_mai }}">
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Ngày nhập
                                        <span class="text-danger-600">*</span></label>
                                    <input type="date"
                                           class="form-control radius-8 @error('ngay_nhap') is-invalid @enderror"
                                           name="ngay_nhap" value="{{ $chiTietSp->ngay_nhap }}">
                                    @error('ngay_nhap')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mô tả </label>
                                    <textarea cols="30" rows="3" class="form-control radius-8" name="mo_ta">{{$chiTietSp->mo_ta}}</textarea>
                                </div>

                                <div class="mb-20">
                                    <label for="desig" class="form-label fw-semibold text-primary-light text-sm mb-8">Danh
                                        mục sản phẩm <span class="text-danger-600">*</span> </label>
                                    <select
                                        class="form-control radius-8 form-select @error('danh_muc_id') is-invalid @enderror"
                                        name="danh_muc_id" id="desig" >
                                        <option value="">Vui lòng chọn</option>
                                        <option value="1" {{$chiTietSp->danh_muc_id == '1' ? 'selected' : ''}}>Danh mục 1</option>
                                        <option value="2" {{$chiTietSp->danh_muc_id == '2' ? 'selected' : ''}}>Danh mục 2</option>
                                    </select>
                                    @error('danh_muc_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="text-center mt-3">
                                    <a href="{{route('sanpham.index')}}" class="btn btn-light-100 text-dark "><i
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

@section('js')
    <script>
        function showImg(event) {
            const img_sp = document.querySelector('#uploaded-img');

            const file = event.target.files[0];

            //lay link anh vua chon
            const reader = new FileReader();

            reader.onload = function () {
                //lay link vao src
                img_sp.src = reader.result;
                img_sp.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }

        }

    </script>
@endsection
