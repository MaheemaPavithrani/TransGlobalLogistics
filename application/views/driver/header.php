<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="icon" href="https://media.licdn.com/dms/image/C560BAQHIlPIKxknf6g/company-logo_200_200/0?e=2159024400&v=beta&t=hqba1sMbj0ANgyUMPELFnaBGYGKMit2qZy7pxPzrkt0">
    <script src="http://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <title>Driver

    </title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-toggleable-xl sticky-top bg-dark flex-md-nowrap p-0" id="nav">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo base_url('user/index');?>"><h3>Trans Global Logistics</h3></a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
     
      <ul class="navbar-nav px-3">
        <div class="row">
          <li class="nav-item text-nowrap" style="padding-right:20px">
            <a class="nav-link" href="<?php echo base_url('User/logout'); ?>"><i class="fa fa-arrow-circle-left fa-fw"></i> Logout</a>
          </li>
        </div> 
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-lg-2 d-none d-lg-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <a href="<?php echo base_url('user/index');?>" class="list-group-item list-group-item-light" style="color:black"><h5><i class="fa fa-home fa-fw"></i> HOME</h5></a>
                <a href="<?php echo base_url('Driver/get_driver_hires/'.$driver['id']);?>" class="list-group-item list-group-item-light" style="color:black"><h5><i class="fa fa-file fa-fw"></i> PAST HIRES</h5></a>
            </ul>
            <br><br>
            <ul class="nav flex-column">
      
                <a href="<?php echo base_url('driver/assigned_hires/'.$driver['id']);?>" class="list-group-item list-group-item-light" style="color:black" ><h5><i class="fa fa-clock fa-fw"></i>  NEW ASSIGNMENTS <span class="badge badge-light"><?php echo $this->assignments;?></span></h5></a>
                <!-- <a href="<?php echo base_url('');?>" class="list-group-item list-group-item-light" style="color:black" ><h5><i class="fa fa-bell fa-fw"></i>  NOTIFICATIONS <span class="badge badge-light"><?php ?></span></h5></a> -->

            </ul>
          </div>
        </nav>

        
    
