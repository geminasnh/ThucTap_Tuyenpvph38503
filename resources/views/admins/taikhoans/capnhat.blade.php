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
                             <form action="{{route('taikhoan.update',$taikhoan->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h6 class="text-md text-primary-light mb-16">Ảnh tai khoan</h6>

                                <div class="upload-image-wrapper d-flex align-items-center gap-3 flex-wrap mb-24 mt-16">
                                    <div class="uploaded-imgs-container d-flex gap-3 flex-wrap"></div>
                                 
                                        <label class="upload-file-multiple h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file-multiple">
                                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Tải lên</span>
                                        <input id="upload-file-multiple" type="file" name="anh_dai_dien"  hidden multiple/>
                                    </label>
                                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Tải lên</span>
                                        <input id="upload-file-multiple" type="file" name="anh_dai_dien"  hidden multiple/>
                                    </label>
                                </div><!--End Upload IMG -->

                                {{--<div class="card-body p-24">
                                    <label for="file-upload-name" class="mb-16 border border-neutral-600 fw-medium text-secondary-light px-16 py-12 radius-12 d-inline-flex align-items-center gap-2 bg-hover-neutral-200">
                                        <iconify-icon icon="solar:upload-linear" class="text-xl"></iconify-icon>
                                        Click to upload
                                        <input type="file" class="form-control w-auto mt-24 form-control-lg" id="file-upload-name" multiple hidden>
                                    </label>
                                    <ul id="uploaded-img-names" class=""></ul>
                                </div>--}} {{--Upload file--}}
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tài khoản <span class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" name="tai_khoan" placeholder="Nhập tên tài khoản">
                              </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Họ tên <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" name="ho_ten" placeholder="Nhập họ tên">
                                </div>
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" name="email" placeholder="Nhập email">
                              </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Số điện thoại <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" name="so_dien_thoai" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">	giới tính </label>
                                    <input type="text" class="form-control radius-8" name="	gioi_tinh" placeholder="Nhập giới tính">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Địa chỉ <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" name="dia_chi" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Ngày sinh <span class="text-danger-600">*</span></label>
                                    <input type="date" class="form-control radius-8" name="ngay_sinh">
                                </div>
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mật khẩu <span class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" name="mat_khau" placeholder="Nhập mật khẩu">
                              </div>
                                <div class="mb-20">
                                    <label for="desig" class="form-label fw-semibold text-primary-light text-sm mb-8">Danh mục sản phẩm <span class="text-danger-600">*</span> </label>
                                    <select class="form-control radius-8 form-select" name="chuc_vu_id" id="desig">
                                        <option selected>Vui lòng chọn</option>
                                        <option value="2">Danh mục 2</option>
                                        <option value="3">Danh mục 1</option>
                                    </select>
                                </div>

                                <div class="text-center mt-3">
                                    <a href="{{route('taikhoan.index')}}" class="btn btn-light-100 text-dark "><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
                                    <button type="reset" class="btn btn-warning-600 radius-8 ">Nhập lại</button>
                                    <button class="btn btn-success-600 radius-8 "><i class="fa-solid fa-plus"></i> Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        /*upload img*/
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
                removeButton.innerHTML = '<iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>';

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
        });//end upload img


        /*Upload file*/
        /*document.getElementById('file-upload-name').addEventListener('change', function(event) {
            var fileInput = event.target;
            var fileList = fileInput.files;
            var ul = document.getElementById('uploaded-img-names');

            ul.classList.add('show-uploaded-img-name');

            for (var i = 0; i < fileList.length; i++) {
                var li = document.createElement('li');
                li.classList.add('uploaded-image-name-list', 'text-primary-600', 'fw-semibold', 'd-flex', 'align-items-center', 'gap-2');

                var iconifyIcon = document.createElement('iconify-icon');
                iconifyIcon.setAttribute('icon', 'ph:link-break-light');
                iconifyIcon.classList.add('text-xl', 'text-secondary-light');

                var crossIconifyIcon = document.createElement('iconify-icon');
                crossIconifyIcon.setAttribute('icon', 'radix-icons:cross-2');
                crossIconifyIcon.classList.add('remove-image','text-xl', 'text-secondary-light', 'text-hover-danger-600');

                crossIconifyIcon.addEventListener('click', (function(liToRemove) {
                    return function() {
                        ul.removeChild(liToRemove);
                    };
                })(li));

                li.appendChild(iconifyIcon);

                li.appendChild(document.createTextNode(' ' + fileList[i].name));

                li.appendChild(crossIconifyIcon);

                ul.appendChild(li);
            }
        });*/


    </script>
@endsection
