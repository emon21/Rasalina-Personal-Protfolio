@extends('admin.admin_master')
@section('title', 'Footer Page')
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
                        <li class="breadcrumb-item active">Footer Page</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow"></i>Footer Page</h4>
               <a href="" class="btn btn-outline-success"><i class="mdi format-list-checkbox"></i>All Footer Page</a>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <form action="{{route('admin.website-setting.footer.update', $footer)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <!-- Phone No -->
                              <div class="mb-3 row">
                                 <label for="footer_phone_no" class="col-sm-2 col-form-label">Phone No</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Phone No...."
                                       id="footer_phone_no" name="footer_phone_no" value="{{ old('footer_phone_no', $footer->footer_phone_no) }}">
                                 </div>
                              </div>

                              <!-- Footer Description -->
                              <div class="mb-3 row">
                                 <label for="footer_description" class="col-sm-2 col-form-label">
                                    Footer Description</label>
                                 <div class="col-sm-10">
                                    <textarea class="form-control" name="footer_description" cols="50" rows="5" id="footer_description"
                                       placeholder="Enter Footer Description...." value="{{ old('short_title', $footer->footer_description) }}">{{ $footer->footer_description }}</textarea>
                                 </div>
                              </div>

                              <!-- Footer Address -->
                              <div class="mb-3 row">
                                 <label for="footer_address" class="col-sm-2 col-form-label">
                                    Footer Address</label>
                                 <div class="col-sm-10">
                                    <textarea class="form-control" name="footer_address" cols="50" rows="5"
                                       id="footer_address" placeholder="Enter  Footer Address...." value="{{ old('footer_address', $footer->footer_address) }}">{{ $footer->footer_address }}</textarea>
                                 </div>
                              </div>

                              <!-- Footer Email -->
                              <div class="mb-3 row">
                                 <label for="footer_email" class="col-sm-2 col-form-label">
                                    Footer Email</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Footer Email...."
                                       id="footer_email" name="footer_email" value="{{ old('footer_email', $footer->footer_email) }}">
                                 </div>
                              </div>

                              <!-- Footer Text -->
                              <div class="mb-3 row">
                                 <label for="footer_text" class="col-sm-2 col-form-label">Footer Text</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Footer Text...."
                                       id="footer_text" name="footer_text" value="{{ old('footer_text', $footer->footer_text) }}">
                                 </div>
                              </div>

                              <!-- Social Facebook Link -->
                              <div class="mb-3 row">
                                 <label for="footer_social_facebook" class="col-sm-2 col-form-label">Social Facebook Link</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Social Facebook Link...."
                                       id="footer_social_facebook" name="footer_social_facebook" value="{{ old('footer_social_facebook', $footer->footer_social_facebook) }}">
                                 </div>
                              </div>

                              <!-- Social Twitter Link -->
                              <div class="mb-3 row">
                                 <label for="footer_social_twitter" class="col-sm-2 col-form-label">Social Twitter Link</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Social Twitter Link...."
                                       id="footer_social_twitter" name="footer_social_twitter" value="{{ old('footer_social_twitter', $footer->footer_social_twitter) }}">
                                 </div>
                              </div>

                              <!-- Copy Right -->
                              <div class="mb-3 row">
                                 <label for="footer_copyright" class="col-sm-2 col-form-label">Copy Right</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter Copy Right...."
                                       id="footer_copyright" name="footer_copyright" value="{{ old('footer_copyright', $footer->footer_copyright) }}">
                                 </div>
                              </div>

                              <!-- Button -->
                              <div class="row">
                                 <label class="col-sm-2 col-form-label"></label>
                                 <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">
                                       <i class="ri-add-line"></i>Update</button>
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