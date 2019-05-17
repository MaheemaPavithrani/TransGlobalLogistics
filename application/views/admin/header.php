<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
    <script src="http://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <title>Admin

    </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/TransGlobalLogistics/admin">Administrator |</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>">Dashboard<span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    CUSTOMERS
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url('admin/get_customers');?>">View All</a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/register_customer');?>">Add Customer</a>
                </div>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    HIRE
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Ongoing</a>
                    <a class="dropdown-item" href="#">Imports</a>
                    <a class="dropdown-item" href="#">Exports</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    DRIVER
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url('admin/get_drivers');?>">View All</a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/register_driver');?>">Add driver</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    VEHICLE
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="admin/get_vehicles">View All</a>
                    <a class="dropdown-item" href="#">Add Vehicle</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        
    
