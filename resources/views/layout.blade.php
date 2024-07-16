    <!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <!-- Chart JS -->
        <!-- -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.css') }}">
        <script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <!-- selectize -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
            integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
            integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>

    <body class="hold-transition sidebar-mini">

        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand-lg navbar-light bg-light justify-content-center">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <!--    <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> -->

                    <!-- Add more navbar items as needed -->
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <div class="container">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle no-arrow" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ Auth::user()->name }} <img src="{{ asset('profile.png') }}" style="width: 40px"
                                    alt="">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" style="text-align: center" id="logout" href="#">Logout
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                            </div>
                        </div>
                    </div>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-info elevation-4 ">
                <!-- Brand Logo -->
                <a href="/dashboard" class="brand-link">
                    <center>
                        <span class="logo"><img class="img" style="width: 50px;" src="{{ asset('laguna.png') }}"
                                alt="">
                        </span>
                    </center>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">

                    <!-- Sidebar user panel (optional) -->

                    <!-- SidebarSearch Form -->
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item ">
                                <a href="/dashboard" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}"
                                    id="myButton">
                                    <img style="width: 20px; " src="{{ asset('images/dashboard.png') }}"
                                        alt="">
                                    <p style="margin-left: 5px">
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/cities/index" class="nav-link {{ Route::is('cities.*') ? 'active' : '' }}">
                                    <img style="width: 20px" src="{{ asset('images/city.png') }}" alt="">
                                    <p>
                                        Cities / Municipalities
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/croptypes/index"
                                    class="nav-link {{ Route::is('croptypes.*') ? 'active' : '' }}">
                                    <img style="width: 20px; " src="{{ asset('images/plant.png') }}" alt="">
                                    <p>
                                        Types of Crops
                                    </p>
                                </a>
                            <li class="nav-header"> Farm and Farmers</li>

                            <!-- menu -->
                            <li class="nav-item " style="color:white">
                                <a href="/farms/index" class="nav-link {{ Route::is('farms.*') ? 'active' : '' }}">
                                    <img style="width: 20px; " src="{{ asset('images/barn.png') }}" alt="">
                                    <p>
                                        Farms
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/farmers/index"
                                    class="nav-link {{ Route::is('farmers.*') ? 'active' : '' }}">
                                    <img style="width: 20px; " src="{{ asset('images/farmer.png') }}"
                                        alt="">
                                    <p>
                                        Farmers
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/farmertypes/index"
                                    class="nav-link {{ Route::is('farmertypes.*') ? 'active' : '' }}">
                                    <img style="width: 20px; " src="{{ asset('images/group.png') }}" alt="">
                                    <p>
                                        Farmer Types
                                    </p>
                                </a>
                            </li>


                            </li>
                            <li class="nav-header">Assistances</li>

                            <li class="nav-item ">
                                <a href="/assistances/index"
                                    class="nav-link {{ Route::is('assistances.*') ? 'active' : '' }}">
                                    <img style="width: 20px;" src="{{ asset('images/assistance.png') }}"
                                        alt="">
                                    <p>
                                        Assistances
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/histories/index"
                                    class="nav-link {{ Route::is('histories.*') ? 'active' : '' }}">
                                    <img style="width: 20px;" src="{{ asset('images/history.png') }}"
                                        alt="">
                                    <p>
                                        Assistance Histories
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">

                            </div><!-- /.col -->
                            <div class="col-sm-6">

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">


                                    <div class="card-body">
                                        @yield('add_btn')
                                        <br>
                                        <ol style="margin-top: -2%" class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item">@yield('folder')</li>
                                            <li class="breadcrumb-item active">@yield('file')</li>

                                        </ol>
                                        <div id="loading-indicator" style="display: none;">
                                            Loading...
                                        </div>
                                        <hr>
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    <!-- Footer-Right -->
                </div>
                <!-- Default to the left -->
                <strong> @ 2024 Provincial Government of Laguna</strong>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <!-- Bootstrap 4 -->
        <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>


        <script>
            $(document).ready(function() {
                $('#myButton').click(function() {
                    $('#loading-indicator').show();
                });
                $('#logout').on('click', function() {
                    Swal.fire({
                        title: "Do you want to log out?",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        showLoaderOnConfirm: true, // Enable loader
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Logging out...', // Display loading text or spinner
                                showConfirmButton: false,
                                allowOutsideClick: false // Prevent closing during logout process
                            });

                            // Simulate logout process completion
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Logged out!',
                                    showConfirmButton: false,
                                    timer: 1500 // Adjust timer as needed
                                });

                                // Redirect after showing the success message
                                setTimeout(() => {
                                    window.location.href = "/logout";
                                }, 1500);
                            }, 1000); // Simulate delay for the logout process
                        }
                    });
                });
            });
        </script>

    </body>
    <style>
        .no-arrow::after {
            display: none;
        }

        /* Additional styling */
        .no-arrow {
            border: none;
            /* Remove the border */
            padding: 10px 20px;
            /* Add padding */
        }


        .sidebar-dark-success,
        .sidebar-dark-success * {
            color: #fff !important;
        }

        .dataTables_paginate .pagination .page-item .page-link {
            color: #4a90e2;
        }

        a {
            text-decoration: none;
        }

        .dropdown-toggle {
            padding: .25rem .4rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }

        table {
            text-align: center;
        }

        table thead tr {
            border: 1px solid black;
        }

        #loading-indicator {
            display: none;
            position: fixed;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.7);
            /* semi-transparent white background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            /* optional: add a box shadow for better visual */
            z-index: 9999;
            /* Set a high z-index value to ensure it appears on top of other elements */
        }

        .select2-results__option--highlighted[aria-selected="true"] {
            background-color: #d3d3d3;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #e9ecef;
            border: 1px solid #adb5bd;
        }

        /* Custom pagination button styles */
    </style>


    </html>
