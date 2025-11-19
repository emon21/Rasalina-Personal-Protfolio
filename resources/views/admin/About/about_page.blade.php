@extends('admin.admin_master')
@section('title', 'About Page')
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
                        <li class="breadcrumb-item active">About Page</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow"></i>About Page</h4>
               <a href="" class="btn btn-outline-success"><i class="mdi format-list-checkbox"></i>All About Page</a>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <form action="{{route('admin.update.about',$about)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="mb-3 row">
                                 <label for="title" class="col-sm-2 col-form-label">Title</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Title...."
                                       id="title" name="title" value="{{ old('title', $about->title) }}">
                                 </div>
                              </div>

                              <!-- Short Title -->
                              <div class="mb-3 row">
                                 <label for="short_title" class="col-sm-2 col-form-label">
                                    Short Title</label>
                                 <div class="col-sm-10">
                                    <textarea class="form-control" name="short_title" cols="50" rows="5" id="short_title"
                                       placeholder="Enter Short Title...." value="{{ old('short_title', $about->short_title) }}">{{ $about->short_title }}</textarea>
                                 </div>
                              </div>

                              <!-- About Image -->
                              <div class="mb-3 row">
                                 <label for="aboutImage" class="col-sm-2 col-form-label">About Image</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="file" name="aboutImage" id="aboutImage" value="{{ old('about_image', $about->about_image) }}">
                                    <!-- OLD Image Preview -->
                                    {{-- <img src="{{ asset($about->about_image) }}" alt=""> --}}
                                    <img src="{{ ($about->about_image) ? asset($about->about_image) : asset('upload/no_image.jpg') }}" alt="" class="mt-2 rounded img-fluid" width="180" height="80">
                                 </div>
                              </div>

                              <!-- Short Description -->
                              <div class="mb-3 row">
                                 <label for="short_description" class="col-sm-2 col-form-label">
                                    Short Description</label>
                                 <div class="col-sm-10">
                                    <textarea class="form-control" name="short_description" cols="50" rows="5"
                                       id="short_description" placeholder="Enter Short Description...." value="{{ old('short_description',$about->short_description) }}">{{ $about->short_description }}</textarea>
                                 </div>
                              </div>

                              <!-- Long Description -->
                              <div class="mb-3 row">
                                 <label for="long_description" class="col-sm-2 col-form-label">
                                    Long Description</label>
                                 <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description"
                                       placeholder="Enter Long Description...." value="{{ old('long_description',$about->long_description) }}">{{ $about->long_description }}</textarea>
                                 </div>
                              </div>

                              <!-- Button -->
                              <div class="row">
                                 <label class="col-sm-2 col-form-label"></label>
                                 <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">
                                       <i class="ri-add-line"></i>Update About Page</button>
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