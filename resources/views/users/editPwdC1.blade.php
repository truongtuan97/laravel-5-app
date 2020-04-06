@extends('layouts.user')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Đổi mật khẩu cấp 1') }}</div>

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
          <form method="post" action="{{route('password_c1.users.update', $user)}}">
            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu mới') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" autocomplete="new-password" placeholder="mật khẩu cấp 1: 8 ký tự trở lên" required>

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
              <label for="password2" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu cấp 2') }}</label>

              <div class="col-md-6">
                <input id="password2" type="password" class="form-control @error('password2') is-invalid @enderror"
                  name="password2" autocomplete="new-password" required>

                @error('password2')
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