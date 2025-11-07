@extends('admin.admin_master')
@section('title', 'Partner Page')
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
                        <li class="breadcrumb-item active">Partner Page</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->

         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow"></i> Partner Page</h4>
               <a href="{{ route('admin.partner.create') }}" class="btn btn-outline-success"><i
                     class="mdi format-list-checkbox"></i>Create Partner</a>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <form action="{{route('admin.partner.update', $partner)}}" method="POST"
                              enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="mb-3 row">
                                 <label for="title" class="col-sm-2 col-form-label">Title</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Title...." id="title"
                                       name="title" value="{{ old('title', $partner->title) }}">
                                 </div>
                              </div>

                              <!-- Short Description -->
                              <div class="mb-3 row">
                                 <label for="short_description" class="col-sm-2 col-form-label">
                                    Short Description</label>
                                 <div class="col-sm-10">
                                    <textarea class="form-control" name="short_description" cols="50" rows="5"
                                       id="short_description" placeholder="Enter Short Description...."
                                       value="{{ old('short_description', $partner->short_description) }}">{{ $partner->short_description }}</textarea>
                                 </div>
                              </div>

                              <!-- Multi Image -->
                              <div class="mb-3 row">
                                 <label for="long_description" class="col-sm-2 col-form-label">
                                    Multi Image</label>
                                 <div class="col-sm-10">
                                    @foreach ($partner->images as $image)
                                       <img src="{{ asset($image->file) }}" alt="" width="85" height="65">
                                    @endforeach
                                 </div>
                              </div>

                              <!-- Edit Button -->
                              <div class="row my-4">
                                 <label class="col-sm-2 col-form-label"></label>
                                 <div class="col-sm-10">
                                    <a href="{{ route('admin.partner.edit', $partner) }}" class="btn btn-info waves-effect waves-light">
                                       <i class="ri-add-line"></i>Edit Image </a>
                                 </div>
                              </div>

                              {{-- <div class="mb-3 row">
                                 <label for="long_description" class="col-sm-2 col-form-label">
                                    Long Description</label>
                                 <div class="col-sm-10">
                                    <textarea class="form-control" name="long_description" cols="50" rows="5"
                                       id="long_description" placeholder="Enter Long Description...."
                                       value="{{ old('long_description', $partner->long_description) }}">{{ $partner->long_description }}</textarea>
                                 </div>
                              </div> --}}

                              <!-- Button -->
                              <div class="row">
                                 <label class="col-sm-2 col-form-label"></label>
                                 <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">
                                       <i class="ri-add-line"></i> Update Partner</button>
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