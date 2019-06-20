<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
    <script src="http://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <title>Admin

    </title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-toggleable-xl sticky-top bg-dark flex-md-nowrap p-0" id="nav">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><h3>Trans Global Logistics</h3></a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
     
      <ul class="navbar-nav px-3">
        <div class="row">
          <li class="nav-item text-nowrap" style="padding-right:10px">
            <a class="nav-link" href="#"><i class="fa fa-bell fa-fw"></i> Notifications</a>
          </li>
          <li class="nav-item text-nowrap" style="padding-right:10px">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> Admin</a>
            <div class="dropdown-menu dropdown-menu-right" style="right: 0; left: auto;">
                <a class="dropdown-item" href="">Profile</a>
                <a class="dropdown-item" href="">Logout</a>
            </div>
          </li>
        </div> 
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-lg-2 d-none d-lg-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
      
                <a href="<?php echo base_url('admin/index');?>" class="list-group-item list-group-item-light" style="color:black" ><h5><i class="fa fa-home fa-fw"></i>  DASHBOARD</h5></a>

                <a href="#customer" class="list-group-item list-group-item-light" data-toggle="collapse" style="color:black" ><h5><i class="fa fa-users fa-fw fa-fw" aria-hidden="true"></i>  CUSTOMERS</h5></a>
                <div class="collapse" id="customer">
                  <a href="<?php echo base_url('admin/get_customers');?>" class="list-group-item">View All</a>
                  <a href="<?php echo base_url('admin/register_customer');?>" class="list-group-item">Add customer</a>
                </div>
            
                <a href="#hire" class="list-group-item list-group-item-light" data-toggle="collapse" style="color:black"><h5><i class="fa fa-file fa-fw"></i>  HIRES</h5></a>
                <div class="collapse" id="hire">
                  <a href="<?php echo base_url('admin/get_ongoing_hires');?>" class="list-group-item">Ongoing</a>
                  <a href="<?php echo base_url('admin/get_imports');?>" class="list-group-item">Imports</a>
                  <a href="<?php echo base_url('admin/get_exports');?>" class="list-group-item">Exports</a>
                </div>

                <a href="#drivers" class="list-group-item list-group-item-light" data-toggle="collapse" style="color:black" ><h5><i class="fa fa-address-card fa-fw"></i>  DRIVERS</h5></a>
                <div class="collapse" id="drivers">
                  <a href="<?php echo base_url('admin/get_drivers');?>" class="list-group-item">View All</a>
                  <a href="<?php echo base_url('admin/register_driver');?>" class="list-group-item">Add Driver</a>
                </div>

                <a href="#vehicle" class="list-group-item list-group-item-light" data-toggle="collapse" style="color:black" ><h5><i class="fa fa-truck fa-fw"></i>  VEHICLES</h5></a>
                <div class="collapse" id="vehicle">
                  <a href="" class="list-group-item">View All</a>
                  <a href="" class="list-group-item">Add Vehicle</a>
                </div>

            </ul>
            <br><br>
            <ul class="nav flex-column">
      
                <a href="<?php echo base_url('admin/get_hire_requests');?>" class="list-group-item list-group-item-light" style="color:black" ><h5><i class="fa fa-clock fa-fw"></i>  Hire Requests</h5></a>

                <a href="#reports" class="list-group-item list-group-item-light" data-toggle="collapse" style="color:black" ><h5><i class="fa fa-book fa-fw fa-fw" aria-hidden="true"></i>  Reports</h5></a>
                <div class="collapse" id="reports">
                  <a href="" class="list-group-item">This Month</a>
                  <a href="" class="list-group-item">Last Quarter</a>
                </div>

            </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul> -->
          </div>
        </nav>

        
    
