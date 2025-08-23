@extends('admin.admin_master')

@section('title', 'Admin Profile')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end page title -->

            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header bg-success border-primary">
                            <h5 class="mb-1 text-white"><i class="mdi mdi-check-all me-2"></i>
                                User Information
                            </h5>
                        </div>
                        <center>
                            <img class="rounded-circle avatar-xl my-3"
                                @if ($UserInfo->profileImage == null) src="{{ asset('uploads') }}/no_image.jpg"
                            @else

                            src="{{ asset($UserInfo->profileImage) }}" @endif
                                alt="Card image cap">
                            <h4>Hi, {{ $UserInfo->name }}</h4>
                        </center>
                        <hr>
                        <div class="card-body">
                            <div class="">
                                <div class="form-group mb-1">
                                    Name : <label for="name">{{ $UserInfo->name }}</label>
                                </div>
                                <div class="form-group mb-1">
                                    Email : <label for="email">{{ $UserInfo->email }}</label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mt-1 d-flex gap-2">
                                <a href="{{ route('admin.edit.profile') }}" class="btn btn-success">Edit
                                    Profile</a>
                                <a href="{{ route('admin.change.password') }}" class="btn btn-success">Change
                                    Password</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
