@extends('admin.admin_master')
@section('title', 'Create Slider')
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
                                <li class="breadcrumb-item active">Slider</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow"></i> Create Slider</h4>
                    <a href="{{ route('home.slider') }}" class="btn btn-outline-success"><i
                            class="mdi format-list-checkbox"></i> All Slider</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('home.slider.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Title"
                                                    id="example-text-input" name="title">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="mb-3 row">
                                            <label for="short_description" class="col-sm-2 col-form-label">Sort
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="short_description" cols="50" rows="5" id="short_description"
                                                    placeholder="Enter Short Description"></textarea>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="mb-3 row">
                                            <label for="sliderImage" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="sliderImage"
                                                    id="sliderImage">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    

                                        <!-- Video Link -->
                                        <div class="w-5/12 mb-4">
                                            <label for="video_link" class="block mb-1 font-medium text-gray-700">
                                                Video Link:</label>
                                                
                                            <input id="video_link" type="text" name="video_link" placeholder="Video Link"
                                            value="{{ old('video_link') }}">
                                                
                                            {{-- <input id="video_link" type="file" name="video_link" placeholder="Video Link"
                                                value="{{ old('video_link') }}"
                                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('video_link') border-red-500 @enderror"> --}}
                                        </div>
                                        
                                        <!-- end row -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">
                                                    <i class="ri-add-line"></i> Create Slider</button>
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
