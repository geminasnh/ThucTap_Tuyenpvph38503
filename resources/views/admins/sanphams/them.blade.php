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

    <div style="margin: auto" class="w-50">

        <form action="{{route('sanpham.store')}}" method="POST">
            @csrf

            <div>
                <label class="form-label">Ảnh sản phẩm</label>
                <div class="upload-image-wrapper d-flex align-items-center gap-3 flex-wrap">
                    <div class="uploaded-imgs-container d-flex gap-3 flex-wrap"></div>
                    <label class="upload-file-multiple h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file-multiple">
                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                        <span class="fw-semibold text-secondary-light">Tải lên</span>
                        <input id="upload-file-multiple" type="file" name="hinh_anh"  hidden multiple/>
                    </label>
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten_san_pham" class="form-control">
            </div>
            <div class="mt-3">
                <label class="form-label">Số lượng</label>
                <input type="text" name="so_luong" class="form-control">
            </div>
            <div class="mt-3">
                <label class="form-label">Giá gốc</label>
                <input type="text" name="gia" class="form-control">
            </div>
            <div class="mt-3">
                <label class="form-label">Giá khuyến mãi</label>
                <input type="text" name="gia_khuyen_mai" class="form-control">
            </div>
            <div class="mt-3">
                <label class="form-label">Ngày nhập</label>
                <input type="date" name="ngay_nhap" class="form-control">
            </div>
            <div class="mt-3">
                <span class="form-label">Mô tả: </span>
                <textarea cols="30" rows="3" class="form-control" name="mo_ta"> </textarea>
            </div>
            <div class="mt-3">
                <select name="danh_muc_id" class="form-select">
                    <option selected>Chọn danh mục sản phẩm</option>
                    <option value="0">Hết</option>
                    <option value="1">Còn</option>
                </select>
            </div>

            <div class="text-center mt-3">
                <a href="{{route('sanpham.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
                <button class="btn btn-success"><i class="fa-solid fa-plus"></i> Thêm</button>
                <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
            </div>
        </form>

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
