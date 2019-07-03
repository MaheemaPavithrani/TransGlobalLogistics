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
    <title>TGL

    </title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a style="text-decoration:none" class=" text-white" href="<?php echo base_url('User/index')?>"><h3>Trans Global Logistics</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link" href="<?php echo base_url('User/index')?>"><h4>Home</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link" href="#"><h4>About Us</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link" href="<?php echo base_url('Customer/services')?>"><h4>Services</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link" href="<?php echo base_url('Customer/contact')?>"><h4>Contact</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item text-nowrap" style="padding-right:10px; padding-left:10px">
                      <a class="nav-link " data-toggle="dropdown" href="#"><h4><i class="fa fa-bell fa-fw"></i> <span class="badge badge-light"><?php echo $this->customer_notifications;?> </span></h4></a>
                      <div class="dropdown-menu" style="right: 100px; left: auto; width: 500px; height: auto;background-color:steelblue; opacity:0.9; ">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><h5 class="text-center">Notifications</h5></li>

                            <?php if(!$customer_notifications):?>
                                <li class="list-group-item"><p>No New Notifications</p></li>
                            <?php else: ?>
                                <?php foreach($customer_notifications as $notif): ?>
                                    <li class="list-group-item"><h6><?php echo $notif['title']; ?></h6> <br> <p><?php echo $notif['hire_type']." ID: ".$notif['hire_id']; ?><br><?php echo $notif['message']; ?></p> <a href="<?php echo base_url('customer/view_notification/'.$notif['id'])?>" class="btn btn-primary">View</a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                      </div>
                    </li>

                    <li class="nav-item text-nowrap" style="padding-right:20px">
                      <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown"><h4><i class="fa fa-user fa-fw"></i></h4></a>
                      <div class="dropdown-menu" style="right: 0px; left: auto; opacity:0.9">
                          <a class="dropdown-item" href="<?php echo base_url('customer/view_profile');?>">Profile</a>
                          <a class="dropdown-item" href="<?php echo base_url('User/logout'); ?>">Logout</a>
                      </div>
                    </li>
                    
                </ul>
            </div>
    </nav>


        

        
    
