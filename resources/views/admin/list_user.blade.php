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
                                    <th>cAccname</th>
                                    <th>dLoginDate</th>
                                    <th>dLogoutDate</th>
                                    <th>nExtPoint</th>
                                    <th>nExtPoint1</th>
                                    <th>bIsBanned</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->cAccName}}</td>
                                    <td>{{$user->dLoginDate}}</td>
                                    <td>{{$user->dLogoutDate}}</td>
                                    <td>{{$user->nExtPoint}}</td>
                                    <td>{{$user->nExtPoint1}}</td>
                                    <td>{{$user->bIsBanned}}</td>                                    
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td><a href="../../../html/ltr/vertical-menu-template/page-users-edit.html"><i class="feather icon-edit-1"></i></a></td>
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
