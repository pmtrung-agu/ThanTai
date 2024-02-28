@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Đăng nhập</h2>
    </div>
</div>
<div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">
    <div class="main">
        <div class="account-login container">
            <!--page-title-->
                <fieldset class="col2-set">
                    <form action="{{ env('APP_URL') }}dang-ky-tai-khoan" method="post" id="registerForm">
                    <div class="col-2 registered-users">
                        <strong>Chưa có tài khoản</strong>
                        <div class="content">
                            <p>Đăng ký thành viên.</p>
                            @if($errors->any())
                                <div class="alert alert-success">
                                  @foreach ($errors->all() as $error)
                                      <p class="required">* {{ $error }}</p>
                                  @endforeach
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <input type="hidden" name="url" value="{{ $url }}">
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="email" value="{{ old('email') }}" id="email" class="input-text required-entry validate-email" title="Email Address" required placeholder="Tài khoản người dùng (Email)">
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Password<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="password" name="password" value="{{ old('password') }}" class="input-text required-entry validate-password" id="password" title="Mật khẩu" required placeholder="Nhập mật khẩu">
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Họ tên<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="name" value="{{ old('name') }}" class="input-text required-entry validate-password" id="name" title="Họ tên" required placeholder="Họ tên">
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Điện thoại<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="tel" name="phone" value="{{ old('phone') }}" class="input-text required-entry validate-password" id="phone" title="Điện thoại" required placeholder="Số điện thoại">
                                    </div>
                                </li>
                            </ul>
                            <p class="required">* Bắt buộc điền thông tin</p>
                            <div class="buttons-set">
                                <button type="submit" title="Create an Account" class="button create-account"><span><span>Tạo tài khoản mới</span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="{{ env('APP_URL') }}dang-nhap" method="post" id="loginForm">
                    <div class="col-2 registed-users">
                        <strong>Đăng nhập</strong>
                        <div class="content">
                            <p>Điền thông tin tài khoản đăng nhập</p>
                            @if (Session::has('msg_login'))
                                <div class="alert alert-success">
                                    <p class="required">{{ Session::get('msg_login') }}</p>
                                </div>
                            @endif
                            <ul class="form-list">
                            	{{ csrf_field() }}
                                <input type="hidden" name="url" value="{{ $url }}">
                                <li>
                                    <label for="email">Email Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="email" value="{{ Session::get('email') }}" id="email" class="input-text required-entry validate-email" title="Email Address" required>
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Password<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="password" name="password" class="input-text required-entry validate-password" id="pass" title="Password" required>
                                    </div>
                                </li>
                            </ul>
                            <p class="required">* Bắt buộc điền thông tin</p>
                            <div class="buttons-set">
                                <button type="submit" class="button login" title="Login" name="send" id="send2"><span>Đăng nhập</span></button>
                            </div>
                            <!--buttons-set-->
                        </div>
                        <!--content-->
                    </div>
                    </form>
                    <!--col-2 registered-users-->
                </fieldset>
                <!--col2-set-->
            </form>
        </div>
        <!--account-login-->
    </div>
    <!--main-container-->
</div>
<!--col1-layout-->
@endsection
