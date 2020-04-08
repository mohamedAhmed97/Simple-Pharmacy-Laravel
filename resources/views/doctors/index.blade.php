@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini">
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
      @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

@endsection
