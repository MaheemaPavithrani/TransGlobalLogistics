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
    <a style="text-decoration:none" class=" text-white" href="<?php echo base_url('Homepage/index')?>"><h3>Trans Global Logistics</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='index')?'active':''?>" href="<?php echo base_url('Homepage/index')?>"><h4>Home</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='about')?'active':''?>" href="<?php echo base_url('Homepage/about')?>"><h4>About Us</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='services')?'active':''?>" href="<?php echo base_url('Homepage/services')?>"><h4>Services</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='contact')?'active':''?>" href="<?php echo base_url('Homepage/contact')?>"><h4>Contact</h4></a>
                    </li>

                    <li class="nav-item"><h4 class="nav-link">|</h4></li>

                    <li class="nav-item" style="padding-right:10px;">
                        <a href = "<?php echo base_url('index.php/user/login'); ?>"><button style="float:right; position:right" class="btn btn-primary navbar-btn btn-sm"><h4>Login</h4></button></a>
                    </li>
                </ul>
            </div>
    </nav>
    

        

        
    
