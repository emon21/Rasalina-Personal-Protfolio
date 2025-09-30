@extends('admin.admin_master')
@section('title', 'Update Multi Image')
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
                        <li class="breadcrumb-item active"> About Multi Image</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow"></i> Update Multi Image</h4>
               <a href="{{ route('all.multi.image') }}" class="btn btn-outline-success"><i
                     class="mdi format-list-checkbox"></i> All Multi Image</a>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        @if(session('files'))
                           <div class="mt-3">
                              <h4>Uploaded Images:</h4>
                              <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                 @foreach(session('files') as $file)
                                    <img src="{{ asset('uploads/multi/' . $file) }}" class="rounded shadow"
                                       style="width: 250px;height:200px">
                                 @endforeach
                              </div>
                           </div>
                        @endif
                        <div class="card-body">
                           <form action="{{route('update.multi-image',$editMultiImage)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <!-- About Image -->
                              <div class="mb-3 row">
                                 <label for="multiImage" class="col-sm-2 col-form-label">About Multi Image</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="file" name="multiImage[]" multiple="" id="multiImage"
                                       value="{{ old('multiImage') }}">
                                    <!-- OLD Image Preview -->
                                    {{-- <img src="{{ asset($about->about_image) }}" alt=""> --}}
                                    <img
                                       src="{{ ($editMultiImage->multiImage) ? asset($editMultiImage->multiImage) : asset('uploads/no_image.jpg') }}"
                                       alt="" class="mt-2 rounded img-fluid" width="180" height="80">
                                 </div>
                              </div>

                              <!-- Button -->
                              <div class="row">
                                 <label class="col-sm-2 col-form-label"></label>
                                 <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">
                                       <i class="ri-add-line"></i>Update Multi Image </button>
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