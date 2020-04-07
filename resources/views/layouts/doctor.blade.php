<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Simple Pharmacy System</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=" {{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}"  >
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" 
     href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
     crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

<body >
    <div class="wrapper">
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <!-- Navbar -->
      
        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Admin Dashboard</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Doctor Admin Panel </a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
       
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Doctors
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admins" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard </p>
                    </a>
                  </li>
                </ul>
              </li> ​
              <li class="nav-item has-treeview">
              @role('pharmacy owner', 'doctor')
                <a href="#" class="nav-link">
                  <i class="fas fa-prescription-bottle-alt nav-icon text-danger"></i>
                  <p class="text-danger font-weight-bold">
                     Your Pharmacy
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                @endrole
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="fas fa-file-medical text-white nav-icon"></i>
                      <p class="text-white font-weight-bold">Orders​</p>
                    </a>
                  </li>
              <li class="nav-item"> 
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-stethoscope nav-icon text-white"></i>
                  <p class="text-white font-weight-bold">
                  Doctors​
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fas fa-file-medical text-white nav-icon"></i>
                      <p class="text-white font-weight-bold">
                        Orders
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-dot-circle nav-icon"></i>
                          <p>test</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>  
              </li>
              </li>
                </ul>
               
                  <li class="nav-item has-treeview">
                  @role('pharmacy owner', 'doctor')
                  <a href="#" class="nav-link">
                    <i class="fas fa-users nav-icon text-success"></i>
                    <p class="text-success font-weight-bold">
                          Doctors
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  @endrole
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="far fa-address-book nav-icon text-white"></i>
                      <p class="text-white font-weight-bold">User Addresses​</p>
                    </a>
                  </li>
                </ul>
                  <li class="nav-item">
                    <a href="/admins/medicines" class="nav-link">
                      <i class="fas fa-pills nav-icon text-white"></i>
                      <p class="text-white font-weight-bold">Medicines</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="fas fa-shopping-cart nav-icon text-success"></i>
                      <p class="text-success font-weight-bold">Orders</p>
                    </a>
                  </li> 
    
                  @role('pharmacy owner', 'doctor')
                  <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="fas fa-history nav-icon text-success"></i>
                      <p class="text-success font-weight-bold">History</p>
                    </a>
                  </li> 
                  @endrole
    
                  @role('pharmacy owner', 'doctor')
                  <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="fas fa-hand-holding-usd nav-icon text-success"></i>
                      <p class="text-success font-weight-bold">Revenue</p>
                    </a>
                  </li> 
                  @endrole
    
    
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
              <nav>
              <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="bg-warning btn" data-widget="pushmenu" href="#">
                   <i class="fas fa-angle-double-left fa-2x"></i></a>
                   <h1 class="m-0 text-dark">Admins</h1>
                </li>
              </ul>
              </nav>
                
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
            @include('sweet::alert')
            @yield('content')
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
   

      
       
<section>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>
</section>
<!-- REQUIRED SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- PAGE SCRIPTS -->
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript" 
src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('/scripts/doctor/deleteDoctor.js')}}"></script>
</body>
</html>
