@extends('layouts.app')

@section('content')
<!-- BEGIN: Content-->
<!-- users list start -->
<section class="users-list-wrapper">
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <!-- datatable start -->
                    
                    <form method="post" class="form form-horizontal form-bordered"
                        action="{{route('management.thongkenap.list')}}">
                        @csrf
                        <div class="row">
                        <div class="col md-4">
                            <div class="row">
                            <div class="col md-4">
                            <label for="ngay_bat_dau"
                                class="col-form-label text-md-right">{{ __('Ngày bắt đầu') }}</label>
                            </div>
                            <div class="col -md-6">
                            <input id="fromDate" type="text" name="fromDate"
                                class="pick-a-date bg-white form-control" value="{{ 
                                    Carbon\Carbon::parse(Carbon\Carbon::Now())->format('m/d/Y') }}">
                            </div>
                            
                            </div>                            
                        </div>                        

                        <div class="col md-4">
                        <div class="row">
                                    <div class="col md-4">
                                    <label for="ngay_bat_dau"
                                class="col-form-label text-md-right">{{ __('Ngày kết thúc') }}</label>
                                    </div>
                            <div class="col md-6">
                            <input id="toDate" type="text" name="toDate"
                                class="pick-a-date bg-white form-control" value="{{ 
                                    Carbon\Carbon::parse(Carbon\Carbon::Now())->format('m/d/Y') }}">
                            </div>
                            
                        </div>
                            
                        </div>

                        <div class="col-md-4">
                            <div class="row">                            
                            <button type="submit" class="btn btn-primary">
                                {{ __('Search') }}
                            </button>
                            </div>
                            
                        </div>
                        </div>
                    </form>
                    
                    <div class="table-responsive">                        
                        <table id="users-list-datatable" class="table">
                            <thead>
                                <tr>                                
                                    <th>id</th>
                                    <th>Ngày nạp</th>                                    
                                    <th>Loại thẻ</th>
                                    <th>Giá trị</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cardChargeLogs as $log)
                                <tr>
                                    <td>{{$log->id}}</td>
                                    <td>{{$log->dateUpdate}}</td>
                                    <td>{{$log->cardType}}</td>
                                    <td>{{$log->value}}</td>                                    
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