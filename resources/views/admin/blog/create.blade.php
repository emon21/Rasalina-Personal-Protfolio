@extends('admin.admin_master')

        
@section('title', 'Create Blog')
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
                                <li class="breadcrumb-item active">Blog Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="my-0 text-success text-bold">
                        <i class="mdi mdi-bullseye-arrow"></i> Blog Page
                    </h4>
                    <a href="" class="btn btn-outline-success"><i class="mdi format-list-checkbox"></i>All Blog Page</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin.blog.store')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Category -->
                                        <div class="mb-3 row">
                                            <label for="name" class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select name="category" id="" class="form-control">
                                                    <option value=""> >> Select Category << </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- blog_title -->
                                        <div class="mb-3 row">
                                            <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Name...."
                                                    id="blog_title" name="blog_title" value="{{ old('blog_title') }}">
                                            </div>
                                        </div>
                                        <!-- blog_image -->
                                        <div class="mb-3 row">
                                            <label for="blog_image" class="col-sm-2 col-form-label">Picture</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="blog_image" name="blog_image">
                                            </div>
                                        </div>
                                        <!-- blog_tags -->
                                        <div class="mb-3 row">
                                            <label for="blog_tags" class="col-sm-2 col-form-label">Tags</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Tags...."
                                                    id="blog_tags" name="blog_tags" data-role="tagsinput" value="Tech,Sports,Education">
                                            </div>
                                        </div>
                                        <!-- Description -->
                                        <div class="mb-3 row">
                                            <label for="blog_description"
                                                class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="blog_description" id="blog_description"
                                                    value="{{ old('blog_description') }}"
                                                    placeholder="Enter Description...."></textarea>
                                            </div>
                                        </div>


                                        <!-- Button -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                                    <i class="ri-add-line"></i>Create</button>
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