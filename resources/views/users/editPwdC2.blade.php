@extends('layouts.user')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Đổi mật khẩu cấp 2') }}</div>

        <div class="card-body">
          @if (session('alert'))
          @if (session('alert') == 'success')
          <div class="alert alert-success mb-2" role="alert">
            Update success.
          </div>
          @endif
          @if (session('alert') == 'failed')
          <div class="alert alert-danger mb-2" role="alert">
            <strong>Oh snap!</strong> Update failed.
          </div>
          @endif
          @endif
          <form method="post" action="{{route('password_c2.users.update', $user)}}">
            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu mới') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" autocomplete="new-password" placeholder="mật khẩu cấp 2: 8 ký tự trở lên" required>

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu mới') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                  autocomplete="new-password">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nhập email') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nhập số điện thoại') }}</label>

              <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">

                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Update') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection