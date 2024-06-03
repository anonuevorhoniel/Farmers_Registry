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

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    
    <div class="wrapper">
   
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <a href="/logout"> <button class="btn btn-sm btn-outline-danger">Logout</button></a>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                <span class="brand-text font-weight-light">Farmers Registry</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ Auth::user()->name }}</a>

                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="/dashboard" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" id="myButton" >
                                <img style="width: 20px" src="{{ asset('images/dashboard.png') }}" alt="">
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/cities/index" class="nav-link {{ Route::is('cities.*') ? 'active' : '' }}">
                                <img style="width: 20px" src="{{ asset('images/city.png') }}" alt="">
                                <p>
                                    Cities
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/assistances/index"
                                class="nav-link {{ Route::is('assistances.*') ? 'active' : '' }}">
                                <img style="width: 20px" src="{{ asset('images/assistance.png') }}" alt="">
                                <p>
                                    Assistances
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/croptypes/index" class="nav-link {{ Route::is('croptypes.*') ? 'active' : '' }}">
                                <img style="width: 20px" src="{{ asset('images/plant.png') }}" alt="">
                                <p>
                                    Types of Crops
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/farms/index" class="nav-link {{ Route::is('farms.*') ? 'active' : '' }}">
                                <img style="width: 20px" src="{{ asset('images/barn.png') }}" alt="">
                                <p>
                                    Farms
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/farmers/index" class="nav-link {{ Route::is('farmers.*') ? 'active' : '' }}">
                                <img style="width: 20px" src="{{ asset('images/farmer.png') }}" alt="">
                                <p>
                                    Farmers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/farmertypes/index"
                                class="nav-link {{ Route::is('farmertypes.*') ? 'active' : '' }}">
                                <img style="width: 20px" src="{{ asset('images/group.png') }}" alt="">
                                <p>
                                    Farmer Types
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/histories/index" class="nav-link {{ Route::is('histories.*') ? 'active' : '' }}">
                                <img style="width: 20px" src="{{ asset('images/history.png') }}" alt="">
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
                            <h1 class="m-0">@yield('head_title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">@yield('folder')</a></li>
                                <li class="breadcrumb-item active">@yield('file')</li>
                            </ol>
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
                            <div class="card" style=" overflow-x: auto;">
                                <div class="card-body">
                                    <div id="loading-indicator" style="display: none;">
                                        Loading...
                                    </div>
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
            <strong>Farmers Registry @ 2024</strong>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


<script>
    $(document).ready(function() {
        $('#myButton').click(function() {
            // Show loading indicator
            $('#loading-indicator').show();
            // Hide button
        

            // Simulate some action (you would replace this with your actual action)
            setTimeout(function() {
                // Hide loading indicator
                $('#loading-indicator').hide();
                // Show button
                $('#myButton').show();
            }, 8000); // Simulate a 2 second action
        });
    });
</script>

</body>
<style>
    .dropdown-toggle {
        padding: .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }

    table {
        text-align: center;

    }

    #dt-search-0 {
        margin-bottom: 10px;
    }

    .pagination {
        margin-top: 30px;
    }

    .dt-info {
        margin-top: 30px;
    }
    #loading-indicator {
    display: none;
    position: fixed;
    top: 50%;
    left: 55%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.7); /* semi-transparent white background */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* optional: add a box shadow for better visual */
    z-index: 9999; /* Set a high z-index value to ensure it appears on top of other elements */
}


    /* Custom pagination button styles */
</style>


</html>
