@extends('admin.admin_master')
@section('title', 'Edit Category')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Category Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="my-0 text-success text-bold">
                        <i class="mdi mdi-bullseye-arrow"></i> Category Page</h4>
                    <a href="" class="btn btn-outline-success"><i class="mdi format-list-checkbox"></i>All Category Page</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin.category.update',$category)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Name -->
                                        <div class="mb-3 row">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Name...."
                                                    id="name" name="name" value="{{ old('name',$category->name) }}">
                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                                    <i class="ri-add-line"></i>Update Category</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection