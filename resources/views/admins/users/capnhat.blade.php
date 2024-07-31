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

    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                             <form action="{{route('admins.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Họ tên <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" value="{{$user->name}}" name="name" placeholder="Nhập họ tên" required>
                                </div>
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tài khoản <span class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" value="{{$user->ho_ten}}"name="ho_ten" placeholder="Nhập tên tài khoản" required>
                              </div>
                          
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" value="{{$user->email}}" name="email" placeholder="Nhập email" required>
                              </div>
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Số điện thoại <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" value="{{$user->so_dien_thoai}}" name="so_dien_thoai" placeholder="Nhập số điện thoại" required>
                                </div>
                            
                           
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Ngày tạo <span class="text-danger-600">*</span></label>
                                    <input type="date" class="form-control radius-8" value="{{$user->ngay_sinh}}"name="ngay_sinh" required>
                                </div>
                                <div class="mb-20">
                                  <label class="form-label fw-semibold text-primary-light text-sm mb-8">Mật khẩu <span class="text-danger-600">*</span></label>
                                  <input type="text" class="form-control radius-8" value="{{$user->password}}" name="password" placeholder="Nhập mật khẩu" required>
                              </div>
                          

                                <div class="text-center mt-3">
                                    <a href="{{route('admins.user.index')}}" class="btn btn-light-100 text-dark "><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
                                    <button type="reset" class="btn btn-warning-600 radius-8 ">Nhập lại</button>
                                    <button class="btn btn-success-600 radius-8 "><i class="fa-solid fa-plus"></i> Sửa</button>
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
