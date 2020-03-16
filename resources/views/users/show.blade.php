@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thông tin tài khoản') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('users.update', $accountInfo)}}">
                        @csrf
                        {{ method_field('PATCH') }}
                        
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Tên nhân vật') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" disabled='true' class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $accountInfo->cAccName }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" disabled='true' class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $accountInfo->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" disabled='true' class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $accountInfo->phone }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Số tiền hiện có') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" disabled='true' class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $accountInfo->nExtPoint1 }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
