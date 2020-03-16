@extends('layouts.login')

@section('content')
<div class="card-body">
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        @csrf

        <fieldset class="form-group position-relative has-icon-left">                                
            <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                name="email" value="{{ old('email') }}" required autofocus placeholder="tài khoản">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>Vui lòng nhập tài khoản</strong>
                    </span>
                @enderror
        </fieldset>

        <fieldset class="form-group position-relative has-icon-left">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                name="password" required autocomplete="current-password" placeholder="mật khẩu">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>Vui lòng nhập mật khẩu</strong>
                </span>
            @enderror
        </fieldset>                            

        <div class="form-group row">
            <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                <fieldset>                                        
                    <input class="form-check-input chk-remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember"> Ghi nhớ</label>
                </fieldset>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary btn-block">
            <i class="feather icon-unlock"></i> Đăng nhập
        </button>
    </form>
</div>
<p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Chưa có tài khoản ?</span></p>
<div class="card-body">
    <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block"><i class="feather icon-user"></i> Đăng ký</a>
</div>
@endsection
