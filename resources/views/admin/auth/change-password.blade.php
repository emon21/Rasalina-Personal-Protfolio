@extends('admin.admin_master')
@section('title', 'Change Password')
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
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">Profile</li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom border-2 border-success d-flex justify-content-between align-items-center">
                        <h5 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow me-1"></i>Change Password</h5>
                     <a href="{{ route('admin.profile') }}" class="btn btn-outline-success">Profile</a>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update.password') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Old Password --->
                                <div class="row mb-3">
                                    <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Old Password..."
                                            id="old_password" value="" name="old_password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- New Password --->
                                <div class="row mb-3">
                                    <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control " type="password" placeholder="New Password..."
                                            id="new_password" value="{{ old('new_password') }}" name="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password --->
                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control " type="password" placeholder="Confirm Password..."
                                            id="confirm_password" value="{{ old('confirm_password') }}"
                                            name="confirm_password">
                                        @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Update Password</button>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
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
