@extends('layouts.app')

@section('content')
<!-- BEGIN: Content-->
<!-- users view start -->
<section class="users-view">
    <!-- users view media object start -->
    <div class="row">
        <div class="col-12 col-sm-7">
            <div class="media mb-2">
                <div class="media-body pt-25">
                    <span>Cấu hình khuyến mãi:</span>
                </div>
            </div>
        </div>
    </div>
    <!-- users view media object ends -->
    <!-- users view card data start -->
    <div class="card">
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
        <div class="card-content">
            <div class="card-body">
                <form method="post" class="form form-horizontal form-bordered"
                    action="{{route('management.chkm.update', $chkm)}}">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="ngay_bat_dau"
                                class="col-form-label text-md-right">{{ __('Ngày bắt đầu') }}</label>
                            <input id="ngay_bat_dau" type="text" name="ngay_bat_dau"
                                class="pick-a-date bg-white form-control" value="{{
                                    Carbon\Carbon::parse(substr($chkm->ngay_bat_dau, 0, strlen($chkm->ngay_bat_dau) - 3))->format('m/d/Y') }}">

                            @error('ngay_bat_dau')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="ngay_ket_thuc"
                                class="col-form-label text-md-right">{{ __('Ngày kết thúc') }}</label>
                            <input id="ngay_ket_thuc" type="text" name="ngay_ket_thuc"
                                class="pick-a-date bg-white form-control" value="{{
                                    Carbon\Carbon::parse(substr($chkm->ngay_ket_thuc, 0, strlen($chkm->ngay_ket_thuc) - 3))->format('m/d/Y') }}">

                            @error('ngay_ket_thuc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="label-control" for="khuyenmai">Khuyến mãi</label>
                            <select id="khuyenmai" name="khuyenmai" class="form-control" value={{ $chkm->khuyenmai }}>
                                <option value="0" {{ $chkm->khuyenmai == 0 ? 'selected' : '' }}>Số lượng</option>
                                <option value="0.1" {{ $chkm->khuyenmai == 0.1 ? 'selected' : '' }}>10%</option>
                                <option value="0.2" {{ $chkm->khuyenmai == 0.2 ? 'selected' : '' }}>20%</option>
                                <option value="0.3" {{ $chkm->khuyenmai == 0.3 ? 'selected' : '' }}>30%</option>
                                <option value="0.4" {{ $chkm->khuyenmai == 0.4 ? 'selected' : '' }}>40%</option>
                                <option value="0.5" {{ $chkm->khuyenmai == 0.5 ? 'selected' : '' }}>50%</option>
                                <option value="0.6" {{ $chkm->khuyenmai == 0.6 ? 'selected' : '' }}>60%</option>
                                <option value="0.7" {{ $chkm->khuyenmai == 0.7 ? 'selected' : '' }}>70%</option>
                                <option value="0.8" {{ $chkm->khuyenmai == 0.8 ? 'selected' : '' }}>80%</option>
                                <option value="0.9" {{ $chkm->khuyenmai == 0.9 ? 'selected' : '' }}>90%</option>
                                <option value="1" {{ $chkm->khuyenmai == 1 ? 'selected' : '' }}>100%</option>
                            </select>

                            @error('khuyenmai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- users view card data ends -->
</section>
<!-- users view ends -->
<!-- END: Content-->
@endsection
