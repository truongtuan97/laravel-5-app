@extends('layouts.app')

@section('content')
<!-- BEGIN: Content-->
<!-- users view start -->
<section class="users-view">
    <!-- users view media object start -->     
    <div class="row">
        <div class="col-12 col-sm-7">
            <div class="media mb-2">
                <a class="mr-1" href="#">
                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-26.png') }}" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                </a>
                <div class="media-body pt-25">
                    <h4 class="media-heading">
                        <span class="users-view-name">{{ $user->cAccName }}</span>
                        <span class="text-muted font-medium-1"></span>
                        <span class="users-view-username text-muted font-medium-1 "></span></h4>
                    <span>ID:</span>
                    <span class="users-view-id">{{ $user->id }}</span>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
            <a href="#" class="btn btn-sm mr-25 border"><i class="feather icon-message-square font-small-3"></i></a>
            <a href="#" class="btn btn-sm mr-25 border">Profile</a>
            <a href="../../../html/ltr/vertical-menu-template/page-users-edit.html"
                class="btn btn-sm btn-primary">Edit</a>
        </div> -->
    </div>
    <!-- users view media object ends -->
    <!-- users view card data start -->
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Username:</td>
                                    <td>{{ $user->cAccName }}</td>
                                </tr>
                                <tr>
                                    <td>Login date:</td>
                                    <td class="users-view-latest-activity">{{ $user->dLoginDate }}</td>
                                </tr>
                                <tr>
                                    <td>Logout date:</td>
                                    <td class="users-view-latest-activity">{{ $user->dLogoutDate }}</td>
                                </tr>
                                <tr>
                                    <td>nExtPoint:</td>
                                    <td class="users-view-verified">{{ $user->nExtPoint }}</td>
                                </tr>
                                <tr>
                                    <td>nExtPoint1:</td>
                                    <td class="users-view-verified">{{ $user->nExtPoint1 }}</td>
                                </tr>
                                <tr>
                                    <td>Is Banned:</td>
                                    <td class="users-view-role">{{ $user->bIsBanned }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><span class="badge badge-success users-view-status">{{ $user->email }}</span></td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td><span class="badge badge-success users-view-status">{{ $user->phone }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- users view card data ends -->
</section>
<!-- users view ends -->
<!-- END: Content-->
@endsection
