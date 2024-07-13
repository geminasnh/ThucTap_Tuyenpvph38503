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
                            <form action="{{route('sanpham.store')}}" method="POST">
                                @csrf
                                <h6 class="text-md text-primary-light mb-16">Ảnh sản phẩm</h6>

                                <div class="upload-image-wrapper d-flex align-items-center gap-3 flex-wrap mb-24 mt-16">
                                    <div class="uploaded-imgs-container d-flex gap-3 flex-wrap"></div>
                                    <label class="upload-file-multiple h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file-multiple">
                                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Tải lên</span>
                                        <input id="upload-file-multiple" type="file" name="hinh_anh"  hidden multiple/>
                                    </label>
                                </div><!--End Upload IMG -->

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tên sản phẩm <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Số lượng <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" name="so_luong" placeholder="Nhập số lượng">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Giá gốc </label>
                                    <input type="text" class="form-control radius-8" name="gia" placeholder="Nhập giá tiền sản phẩm">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Giá khuyến mãi <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi sản phẩm">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Ngày nhập <span class="text-danger-600">*</span></label>
                                    <input type="date" class="form-control radius-8" name="ngay_nhap">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mô tả </label>
                                    <textarea cols="30" rows="3" class="form-control radius-8" name="mo_ta"> </textarea>
                                </div>
                                <div class="mb-20">
                                    <label for="desig" class="form-label fw-semibold text-primary-light text-sm mb-8">Danh mục sản phẩm <span class="text-danger-600">*</span> </label>
                                    <select class="form-control radius-8 form-select" name="danh_muc_id" id="desig">
                                        <option selected>Vui lòng chọn</option>
                                        <option value="0">Danh mục 0</option>
                                        <option value="1">Danh mục 1</option>
                                    </select>
                                </div>

                                <div class="text-center mt-3">
                                    <a href="{{route('sanpham.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
                                    <button class="btn btn-success mx-20"><i class="fa-solid fa-plus"></i> Thêm</button>
                                    <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        const fileInputMultiple = document.getElementById("upload-file-multiple");
        const uploadedImgsContainer = document.querySelector(".uploaded-imgs-container");

        fileInputMultiple.addEventListener("change", (e) => {
            const files = e.target.files;

            Array.from(files).forEach(file => {
                const src = URL.createObjectURL(file);

                const imgContainer = document.createElement('div');
                imgContainer.classList.add('position-relative', 'h-120-px', 'w-120-px', 'border', 'input-form-light', 'radius-8', 'overflow-hidden', 'border-dashed', 'bg-neutral-50');

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('uploaded-img__remove', 'position-absolute', 'top-0', 'end-0', 'z-1', 'text-2xxl', 'line-height-1', 'me-8', 'mt-8', 'd-flex');
                removeButton.innerHTML = '';

                const imagePreview = document.createElement('img');
                imagePreview.classList.add('w-100', 'h-100', 'object-fit-cover');
                imagePreview.src = src;

                imgContainer.appendChild(removeButton);
                imgContainer.appendChild(imagePreview);
                uploadedImgsContainer.appendChild(imgContainer);

                removeButton.addEventListener('click', () => {
                    URL.revokeObjectURL(src);
                    imgContainer.remove();
                });
            });

            fileInputMultiple.value = '';
        });


    </script>
@endsection
