<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    {{-- <title>Dashboard | Upcube - Admin & Dashboard Template</title> --}}
    {{-- <title>{{ $title ?? 'Upcube - Admin & Dashboard Template' }}</title> --}}
    <title>@yield('title', 'Dashboard')</title>
    {{-- <title>{{ $title ?? 'Dashboard' }}</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('backend') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Toastr Css -->

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">

    <!-- font-awesome Css -->
    {{--
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" /> --}}

    {{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" /> --}}
<style>
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>
    

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Header Start -->
        @include('admin.partials.topbar')
        <!-- Header End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.partials.sidebar')

        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            @include('admin.partials.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script
        src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>

    <!-- apexcharts -->
    <script src="{{ asset('backend') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ asset('backend') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script
        src="{{ asset('backend') }}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
        </script>

    <!-- dashboard init -->
    <script src="{{ asset('backend') }}/assets/js/pages/dashboard.init.js"></script>

    <!--tinymce js-->
    <script src="{{ asset('backend') }}/assets/libs/tinymce/tinymce.min.js"></script>

    <!-- init js -->
    <script src="{{ asset('backend') }}/assets/js/pages/form-editor.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('backend') }}/assets/js/app.js"></script>

    <!-- Toastr js -->


    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    {!! renderToastr() !!}


    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.11/sweetalert.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <script>

        // Swal.fire({
        //     title: "Good job!",
        //     text: "You clicked the button!",
        //     icon: "success"
        // });

        // Swal.fire({
        //     title: "Drag me!",
        //     icon: "success",
        //     draggable: true
        // });


        // Swal.fire({
        //     position: "top-end",
        //     icon: "success",
        //     title: "Your work has been saved",
        //     showConfirmButton: false,
        //     timer: 1500
        // });

        // delete
        // Swal.fire({
        //     title: "Are you sure?",
        //     text: "You won't be able to revert this!",
        //     icon: "warning",
        //     showCancelButton: true,
        //     confirmButtonColor: "#3085d6",
        //     cancelButtonColor: "#d33",
        //     confirmButtonText: "Yes, delete it!"
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         Swal.fire({
        //             title: "Deleted!",
        //             text: "Your file has been deleted.",
        //             icon: "success"
        //         });
        //     }
        // });


        // document.querySelectorAll('.delete-btn').forEach(button => {
        //     button.addEventListener('click', function () {
        //         let id = this.getAttribute('data-id');
        //         Swal.fire({
        //             title: 'Are you sure?',
        //             text: "You won't be able to revert this!",
        //             icon: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Yes, delete it!'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 document.getElementById('delete-form-' + id).submit();
        //             }
        //         })
        //     });
        // });


        // delete confirm on Function

        // function DeleteConfirm(event) {

        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire({
        //                 title: "Deleted!",
        //                 text: "Your file has been deleted.",
        //                 icon: "success"
        //             });
        //         }
        //     });

        // }


        // function deleteConfirmation(event) {
        //     event.preventDefault();
        //     let form = event.currentTarget.closest("form");
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "You won’t be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: " #3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!",
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // document.getElementById("delete-form-" + id).submit(); // location.reload(); form.submit(); }
        //             // form.submit();
        //             form.submit();
        //         }
        //     });
        // }


        // function deleteConfirmation(event) {
        //         event.preventDefault();
        //         let form = event.currentTarget.closest("form");
        //         Swal.fire({
        //             title: "Are you sure?",
        //             text: "You won’t be able to revert this!",
        //         icon: "warning",
        //             showCancelButton: true,
        //             confirmButtonColor: "#3085d6",
        //             cancelButtonColor: "#d33",
        //             confirmButtonText: "Yes, delete it!"
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 form.submit();
        //             }
        //         });
        //     }

        function deleteConfirmation(event) {
            // Prevent the form from submitting immediately
            event.preventDefault();

            // Get the form that triggered this function
            const form = event.target.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if user confirmed
                    form.submit();

                    Swal.fire(
                        'Deleted!',
                        'Your image has been deleted.',
                        'success'
                    );
                }
            });
        }


    </script>
    {{--
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif --}}



    @stack('script')
</body>

</html>