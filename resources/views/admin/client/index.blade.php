@extends('admin.admin_master')

@section('title', 'Admin Client')

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
                        <li class="breadcrumb-item active">Client</li>
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
                     class="bg-transparent border-2 card-header border-bottom border-success d-flex justify-content-between align-items-center">
                     <h5 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow me-1"></i>All Client
                     </h5>
                     <a href="#" class="btn btn-outline-success">Create Client</a>
                  </div>

                  <div class="card-body">
                     <table id="alternative-page-datatable"
                                                            class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                                            role="grid"
                                                            aria-describedby="alternative-page-datatable_info"
                                                            style="width: 1580px;">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th># Sl No</th>
                                                                    <th>User Name</th>
                                                                    <th>Description</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse($clients as $client)
                                                                    <tr class="odd">
                                                                        <td>
                                                                            {{ $loop->iteration }}</td>
                                                                        <td>{{ $client->user->name ?? 'N/A' }}</td>
                                                                        <td>{{ $client->message }}</td>
                                                                        <td>
                                                                            <a href="#"
                                                                                class="btn btn-primary"><i
                                                                                    class="mdi mdi-pencil"></i>
                                                                            </a>
                                                                            <a href="#"
                                                                                class="btn btn-danger"><i
                                                                                    class="mdi mdi-delete"></i></a>
                                                                        </td> 
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td>
                                                                           <span class="py-3 text-2xl text-center text-danger">
                                                                                No Data Dound
                                                                           </span>
                                                                        </td>
                                                                    </tr>
                                                                @endforelse

                                                            </tbody>
                                                        </table>
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
@endpush