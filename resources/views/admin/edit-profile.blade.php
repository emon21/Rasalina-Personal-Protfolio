@extends('admin.admin_master')

@section('title', 'Admin Profile')
<style>
    .preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }

    .preview-box {
        position: relative;
        display: inline-block;
    }

    .preview-box img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 2px dashed #ccc;
        border-radius: 6px;
    }

    .remove-btn {
        position: absolute;
        top: -8px;
        right: -8px;
        background: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        cursor: pointer;
        font-size: 12px;
    }
</style>
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

                <div class="col-12">

                    <div class="card">
                        <div
                            class="card-header bg-success border-primary d-flex justify-content-between align-items-center">
                            <h4 class="pt-1">Edit Profile</h4>
                            <a href="{{ route('admin.profile') }}" class="btn btn-outline-dark">Profile</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Your Name" id="name"
                                            value="{{ $UserInfo->name }}" name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" placeholder="bootstrap@example.com"
                                            id="email" value="{{ $UserInfo->email }}" name="email">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="profileImage" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="profileImage"
                                            accept="image/*" onchange="previewImage(event)">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <!-- Preview Box -->
                                        <div class="" id="preview-container"
                                            style="position: relative; display: block; width:340px; height: 215px;">
                                            <img id="preview"
                                            
                                                @if ($UserInfo->profileImage) src="{{ asset($UserInfo->profileImage) }}" 
                                            @else src="{{ asset('uploads') }}/no_image.jpg" @endif
                                                alt="Preview Image" width="240"
                                                style="border:1px solid #ccc; padding:5px; border-radius:8px;"
                                                height="216">
                                            <!-- ❌ Remove Button -->
                                            <button type="button" id="removePreview"
                                                style="position:absolute;top: 15px;right: 115px;background:red;color:white;border:none;border-radius:50%;width:25px;height:25px;cursor:pointer;">
                                                ✖
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
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

@push('script')
    <script>
        const defaultImage =
            "https://www.pngplay.com/wp-content/uploads/8/Upload-Icon-Image-Transparent-Image.png"; // আপনার default image path

        function previewImage(event) {
            let input = event.target;
            let reader = new FileReader();

            reader.onload = function() {
                document.getElementById('preview').src = reader.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        // ❌ Remove Preview => reset to default
        document.getElementById('removePreview').addEventListener('click', function() {
            document.getElementById('preview').src = defaultImage; // default এ ফিরবে
            document.getElementById('image').value = ""; // clear input
        });
    </script>
@endpush
