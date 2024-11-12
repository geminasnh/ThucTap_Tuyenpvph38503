@extends('layouts.client')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thông tin cá nhân</div>

                    <div class="card-body">
                        <div class="row">
                            <!-- User Information Section (left side) -->
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . Auth::user()->anh_dai_dien) }}" alt="Avatar" class="rounded-circle border shadow" style="width: 120px; height: 120px;">
                                </div>
                                <div class="mb-3">
                                    <strong>Họ và tên:</strong> {{ Auth::user()->name }}
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong> {{ Auth::user()->email }}
                                </div>
                                <div class="mb-3">
                                    <strong>Số điện thoại:</strong> {{ Auth::user()->so_dien_thoai }}
                                </div>
                                <div class="mb-3">
                                    <strong>Giới tính:</strong> {{ Auth::user()->gioi_tinh }}
                                </div>
                                <div class="mb-3">
                                    <strong>Địa chỉ:</strong> {{ Auth::user()->dia_chi }}
                                </div>
                                <div class="mb-3">
                                    <strong>Ngày sinh:</strong> {{ Auth::user()->ngay_sinh }}
                                </div>
                                <div class="mb-3">
                                    <strong>Vai trò:</strong> {{ Auth::user()->role }}
                                </div>
                            </div>

                            <!-- Update Profile Form (right side) -->
                            <div class="col-md-6">
                                <!-- Form to logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right">Đăng xuất</button>
                                </form>

                                <!-- Form to update personal information -->
                                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <!-- Display current avatar and allow changing -->
                                            <label for="avatar">Cập nhật ảnh đại diện:</label>
                                            <input type="file" name="avatar" id="avatar" class="form-control mb-3">
                                        </div>

                                        <!-- Form fields for user details -->
                                        <div class="mb-3">
                                            <label for="name">Họ và tên:</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone">Số điện thoại:</label>
                                            <input type="text" name="so_dien_thoai" id="phone" class="form-control" value="{{ Auth::user()->so_dien_thoai }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="gender">Giới tính:</label>
                                            <select name="gioi_tinh" id="gender" class="form-control">
                                                <option value="Nam" {{ Auth::user()->gioi_tinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                <option value="Nữ" {{ Auth::user()->gioi_tinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address">Địa chỉ:</label>
                                            <input type="text" name="dia_chi" id="address" class="form-control" value="{{ Auth::user()->dia_chi }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="dob">Ngày sinh:</label>
                                            <input type="date" name="ngay_sinh" id="dob" class="form-control" value="{{ Auth::user()->ngay_sinh }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="role">Vai trò:</label>
                                            <input type="text" name="role" id="role" class="form-control" value="{{ Auth::user()->role }}" disabled>
                                        </div>

                                        <button type="submit" class="btn btn-success float-right">Cập nhật thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
