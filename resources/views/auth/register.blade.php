@extends('layouts.auth')

@section('content')

    <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
        <div class="max-w-464-px mx-auto w-100">
            <div>
                <a href="#" class="mb-40 max-w-290-px">
                    <img src="{{ asset('img/lg4.png') }}" alt="">
                </a>
                <h4 class="mb-12">Đăng ký</h4>
                <p class="mb-32 text-secondary-light text-lg">Đăng ký tài khoản</p>
            </div>
            <form action="{{route('register')}}" method="POST">
                @csrf

                <div class="icon-field mb-16">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="f7:person"></iconify-icon>
                    </span>
                    <input type="text" value="{{old('name')}}" name="name"
                           class="@error('name') is-invalid @enderror form-control h-56-px bg-neutral-50 radius-12"
                           placeholder="Tài khoản">
                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                </div>

                <div class="icon-field mb-16">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span>
                    <input type="email" name="email" id="email" value="{{old('email')}}"
                           class="@error('email') is-invalid @enderror form-control h-56-px bg-neutral-50 radius-12"
                           placeholder="Email">
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>

                <div class="mb-20">
                    <div class="position-relative">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password"
                                   class="@error('password') is-invalid @enderror form-control h-56-px bg-neutral-50 radius-12"
                                   id="your-password" placeholder="Password">
                            @error('password') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <span
                            class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                            data-toggle="#your-password"></span>
                    </div>
                </div>
                
                <!-- Add this field for password confirmation -->
                <div class="mb-20">
                    <div class="position-relative">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password_confirmation"
                                   class="@error('password_confirmation') is-invalid @enderror form-control h-56-px bg-neutral-50 radius-12"
                                   placeholder="Confirm Password">
                            @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                </div>
      
                <div class="">
                    <div class="d-flex justify-content-between gap-2">
                        <div class="form-check style-check d-flex align-items-start">
                            <input class="form-check-input border border-neutral-300 mt-4" type="checkbox" value=""
                                   id="condition" required>
                            <label class="form-check-label text-sm" for="condition">
                                Đồng ý với điều khoản của chúng tôi
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Điều khoản</a> và
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Chính sách</a>
                            </label>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Đăng
                    ký
                </button>

                <div class="mt-32 center-border-horizontal text-center">
                    <span class="bg-base z-1 px-4">Hoặc</span>
                </div>
                <div class="mt-32 d-flex align-items-center gap-3">
                    <button type="button"
                            class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                        <iconify-icon icon="ic:baseline-facebook"
                                      class="text-primary-600 text-xl line-height-1"></iconify-icon>
                        Facebook
                    </button>
                    <button type="button"
                            class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                        <iconify-icon icon="logos:google-icon"
                                      class="text-primary-600 text-xl line-height-1"></iconify-icon>
                        Google
                    </button>
                </div>
                <div class="mt-32 text-center text-sm">
                    <p class="mb-0">Đã có tài khoản? <a href="{{route('login')}}" class="text-primary-600 fw-semibold">Đăng
                            nhập</a></p>
                </div>

            </form>
        </div>
    </div>

@endsection


@section('js')
<script>
    document.getElementById("email").addEventListener("submit", function(event) {
      event.preventDefault();
      const email = document.getElementById("email").value;
      const feedback = document.getElementById("feedback");

      if (validateGmail(email)) {
        feedback.textContent = "Valid Gmail address.";
        feedback.style.color = "green";
      } else {
        feedback.textContent = "Invalid Gmail address.";
        feedback.style.color = "red";
      }
    });
    function validateGmail(email) {
      const gmailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return gmailPattern.test(email);
    }

</script>

@endsection