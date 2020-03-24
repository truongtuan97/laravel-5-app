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
                    <div class="table-responsive">
                        <table id="users-list-datatable" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tài khoản Admin</th>
                                    <th>Tài khoản người dùng </th>
                                    <th>Ngày cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accountInfoLogs as $log)
                                <tr>
                                    <td>{{$log->id}}</td>
                                    <td>{{$log->adminAccount}}</td>
                                    <td>{{$log->userAccount}}</td>
                                    <td>{{$log->dateUpdate}}</td>
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
