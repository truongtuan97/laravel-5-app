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
