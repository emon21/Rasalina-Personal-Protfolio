@extends('admin.admin_master')

@section('title', 'All Blog Category')

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
                                <li class="breadcrumb-item active">All Blog Category</li>
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
                            <h5 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow me-1"></i> All
                                Blog Category
                            </h5>
                            <a href="{{ route('add.portfolio') }}" class="btn btn-outline-success">Create Blog Category</a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-danger: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="border rounded-lg bg-dark border-light text-light">
                                                <th width="15">#SL No</th>
                                                <th width="75">Name</th>
                                                <th width="25">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($blogCategory as $item)
                                                <tr class="">
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $item->portfolio_name }}
                                                    </td>


                                                    {{-- <td>
                                                        <a href="{{ route('edit.portfolio', $item) }}"
                                                            class="btn btn-primary" title="Edit Data"><i
                                                                class="mdi mdi-pencil"></i>
                                                        </a>

                                                        <form action="{{ route('delete.portfolio', $item) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="deleteConfirmation(event)"
                                                                title="Delete Data"
                                                                class="px-3 py-2 text-white border-0 rounded bg-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td> --}}
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