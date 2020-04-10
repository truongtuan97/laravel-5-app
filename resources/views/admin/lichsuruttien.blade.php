@extends('layouts.app')

@section('content')
<!-- BEGIN: Content-->
<!-- users list start -->
<section class="users-list-wrapper">
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <form method="post" class="form form-horizontal" action="{{route('management.lichsuruttien.list')}}">
            @csrf
            <div class="row form-group">
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-5">
                    <label for="accountName" class="col-form-label text-md-right">{{ __('Tài khoản') }}</label>
                  </div>
                  <div class="col-md-6">
                    <input id="accountName" type="text"
                      class="form-control{{ $errors->has('accountName') ? ' is-invalid' : '' }}" name="accountName"
                      value="{{ $accountName }}" required autofocus />
                  </div>

                </div>
              </div>

              <div class="col-md-7">
                <div class="row">

                  <div class="col-md-3">
                    <label for="fromDate" class="col-form-label text-md-right">{{ __('Ngày bắt đầu') }}</label>
                  </div>
                  <div class="col-md-3">
                    <input id="fromDate" type="text" name="fromDate" class="pick-a-date bg-white form-control" value="{{ !empty($fromDate) ? 
                                                Carbon\Carbon::parse($fromDate)->format('m/d/Y') :
                                                Carbon\Carbon::parse(Carbon\Carbon::Now())->format('m/d/Y') }}">
                  </div>

                  <div class="col-md-3">
                    <label for="toDate" class="col-form-label text-md-right">{{ __('Ngày kết thúc') }}</label>
                  </div>
                  <div class="col-md-3">
                    <input id="toDate" type="text" name="toDate" class="pick-a-date bg-white form-control" value="{{ !empty($toDate) ? 
                                                Carbon\Carbon::parse($toDate)->format('m/d/Y') :
                                                Carbon\Carbon::parse(Carbon\Carbon::Now())->format('m/d/Y') }}">
                  </div>

                </div>

              </div>

              <div class="col-md-2">
                <div class="row">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Search') }}
                  </button>
                </div>

              </div>
            </div>
          </form>
          <!-- datatable start -->
          <div class="table-responsive">
            <table id="users-list-datatable" class="table">
              <thead>
                <tr>
                  <th>Tài khoản</th>
                  <th>Số xu trước đó</th>
                  <th>Số xu rút</th>
                  <th>Số xu sau khi rút</th>
                  <th>Ngày rút</th>
                </tr>
              </thead>
              <tbody>
                @foreach($userMoneyTakenLogs as $log)
                <tr>
                  <td>{{$log->AccountName}}</td>
                  <td>{{$log->OldMoney}}</td>
                  <td>{{$log->SubtractMoney}}</td>
                  <td>{{$log->NewMoney}}</td>
                  <td>{{$log->DateUpdate}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- datatable ends -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->

<!-- END: Content-->
@endsection