@extends('admin.admin_master')
@section('title', 'Edit Slider')
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
                    <h4 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow"></i> Edit Slider</h4>
                    <a href="{{ route('home.slider') }}" class="btn btn-outline-success"><i
                            class="mdi format-list-checkbox"></i> All Slider</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('home.slider.update', $slider) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Title"
                                                    id="example-text-input" name="title" value="{{ $slider->title }}">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="mb-3 row">
                                            <label for="short_description" class="col-sm-2 col-form-label">Sort
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="short_description" cols="50" rows="5" id="short_description"
                                                    placeholder="Enter Short Description" value="{{ $slider->short_title }}">{{ $slider->short_title }}</textarea>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="mb-3 row">
                                            <label for="sliderImage" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="sliderImage"
                                                    id="sliderImage">
                                            </div>
                                            <!-- old image show -->
                                            <div class="mt-2 ml-2 row">
                                                <label for="" class="col-form-label col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <img src="{{ asset($slider->photo) }}"
                                                        style="height: 150px; width: 180px;border-radius:5px " alt="User Image"
                                                        class="img-fluid rounded-lg">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                        
                                        {{-- <p>path</p>{{ $slider->video_url }} --}}
                                        {{-- <iframe width="560" height="315" src="{{ $slider->video_url }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe> --}}

                                        <!-- Video URL -->
                                        <div class="mb-3 row">
                                            <label for="videoUrl" class="col-sm-2 col-form-label">Video Link</label>
                                            <div class="col-sm-10">
                                                <input id="video_link" type="text" name="video_link" class="form-control"
                                                    placeholder="Video Link" value="{{ old('video_link') }}">
                                            </div>
                                        </div>

                                        <!-- end row -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">
                                                    <i class="ri-add-line"></i> Update Slider</button>
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
@push('script')
    <script>
        // Select elements
        const playButton = document.getElementById('play-button');
        const previewImage = document.getElementById('video-preview');
        const videoIframe = document.getElementById('video-iframe');

        // Add event listener to the play button
        playButton.addEventListener('click', () => {
            // Hide preview image and play button
            previewImage.classList.add('hidden');
            playButton.classList.add('hidden');

            // Show iframe and set video source
            videoIframe.classList.remove('hidden');
            videoIframe.play();
        });



        function printRecipe() {
            var printContent = document.getElementById('printRecipe').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>
@endpush
