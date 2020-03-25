@extends('layouts.user')

@section('content')
<!-- BEGIN: Content-->
<!-- users list start -->
<section class="users-list-wrapper">
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <!-- datatable start -->
                    <div class="table-responsive">
                        <table id="users-list-datatable" class="table">
                            <thead>
                                <tr>
                                    <th>Tài khoản</th>
                                    <th>Ngày nạp</th>
                                    <th>Loại nạp</th>
                                    <th>Số tiền nạp (vnđ)</th>
                                    <th>Số tiền trong game</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userCardChargeLogs as $log)
                                <tr>
                                    <td>{{$log->userAccount}}</td>
                                    <td>{{$log->dateUpdate}}</td>
                                    <td>{{$log->cardType}}</td>
                                    <td>{{$log->value}}</td>
                                    <td>{{$log->realValue}}</td>
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
