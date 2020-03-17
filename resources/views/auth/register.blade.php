@extends('layouts.login')

@section('content')
<div class="card-body">
    <form method="POST" action="{{ route('register') }}" class="form-horizontal">
        @csrf

        <fieldset class="form-group position-relative has-icon-left">            
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"  placeholder="tài khoản"
                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>Nhập tài khoản {{ $message }}</strong>
                </span>
            @enderror
        </fieldset>

        <fieldset class="form-group position-relative has-icon-left">            
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="email"
                value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>Vui lòng nhập email {{ $message }}</strong>
                </span>
            @enderror
        </fieldset>

        <fieldset class="form-group position-relative has-icon-left">            
            <input id="email" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="số điện thoại"
                value="{{ old('phone') }}" required autocomplete="phone">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>Vui lòng nhập số điện thoại</strong>
                </span>
            @enderror
        </fieldset>

        <fieldset class="form-group position-relative has-icon-left">            
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="mật khẩu"
                required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>Vui lòng nhập mật khẩu</strong>
                </span>
            @enderror
        </fieldset>

        <fieldset class="form-group position-relative has-icon-left">            
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="nhập lại mật khẩu"
                required autocomplete="new-password">
        </fieldset>

        <!-- <div class="form-group row">
            <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                <fieldset>
                    <input type="checkbox" id="remember" class="chk-remember">
                    <label for="remember"> Ghi nhớ</label>
                </fieldset>
            </div>
        </div> -->
        
        <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-user"></i> Đăng ký</button>
    </form>
    <a href="{{ route('login') }}" class="btn btn-outline-danger btn-block mt-2"><i class="feather icon-unlock"></i> Đăng nhập</a>
</div>
@endsection
