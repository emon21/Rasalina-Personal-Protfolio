@extends('admin.admin_master')

@section('title', 'Admin about')

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
                                <li class="breadcrumb-item active">about</li>
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
                            <h5 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow me-1"></i>All about
                            </h5>
                            <a href="#" class="btn btn-outline-success">Create about</a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="alternative-page-datatable_wrapper"
                                                class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length"
                                                            id="alternative-page-datatable_length">
                                                            <label>Show
                                                                <select name="alternative-page-datatable_length"
                                                                    aria-controls="alternative-page-datatable"
                                                                    class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="alternative-page-datatable_filter"
                                                            class="dataTables_filter"><label>Search:<input type="search"
                                                                    class="form-control form-control-sm" placeholder=""
                                                                    aria-controls="alternative-page-datatable"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="alternative-page-datatable"
                                                            class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                                            role="grid"
                                                            aria-describedby="alternative-page-datatable_info"
                                                            style="width: 1580px;">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th># Sl No</th>
                                                                    <th>Title</th>
                                                                    <th>Sort Description</th>
                                                                    <th>Image</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse($aboutPage as $about)
                                                                    <tr class="odd">
                                                                        <td>
                                                                            {{ $loop->iteration }}</td>
                                                                        <td>{{ $about->title }}</td>
                                                                        <td>
                                                                            <img src="{{ asset($about->photo) }}"
                                                                                alt="" class="img-fluid"
                                                                                style="width:120px;height:85px">
                                                                        </td>
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

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
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
    
    </script>
@endpush
