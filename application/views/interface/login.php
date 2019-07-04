<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="https://media.licdn.com/dms/image/C560BAQHIlPIKxknf6g/company-logo_200_200/0?e=2159024400&v=beta&t=hqba1sMbj0ANgyUMPELFnaBGYGKMit2qZy7pxPzrkt0">

	<link rel="stylesheet" type="text/css" href="../../css/loginstyle.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a style="text-decoration:none" class=" text-white" href="<?php echo base_url('Homepage')?>"><h3>Trans Global Logistics</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='index')?'active':''?>" href="<?php echo base_url('Homepage/index')?>"><h4>Home</h4></a>
                    </li>
                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='about')?'active':''?>" href="<?php echo base_url('Homepage/about')?>"><h4>About Us</h4></a>
                    </li>
                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='services')?'active':''?>" href="<?php echo base_url('Homepage/services')?>"><h4>Services</h4></a>
                    </li>
                    <li class="nav-item" style="padding-right:10px;">
                        <a class="nav-link <?=($this->uri->segment(2)==='contact')?'active':''?>" href="<?php echo base_url('Homepage/contact')?>"><h4>Contact</h4></a>
                    </li>
                    <!-- <li>
                        <a href = "<?php echo base_url('index.php/user/login'); ?>"><button style="float:right; position:right" class="btn btn-primary navbar-btn"><h4>Login</h4></button></a>
                    </li> -->
                </ul>
            </div>
    </nav>
<div class="container">
	<br>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<?php echo validation_errors();?>
				<?php if($this->session->flashdata()): ?>
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible">
								<?php echo $this->session->flashdata('login_error'); ?>
							</div>
						</div>
					</div>
				<?php endif;?>
			</div>
			<div class="card-body" style="height:200px">
				<?php echo form_open('User/login')?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="<?php echo base_url('User/register_customer')?>">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<footer class="footer bg-dark text-white">

        <!-- Footer Links -->
        <div class="container-fluid pt-5 pb-2">
            <div class="row">

                <div class="col-md-3 col-lg-4 col-xl-3">
                    <h4>Trans Global Logistics</h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p>
                        We have established a strong presence in the transportation industry. Our award-winning services earn a reputation for quality and excellence that few can rival.
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                    <h4>Services</h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p><a href="<?php echo base_url('index.php/user/login')?>" class="text-white">Imports</a></p>
                    <p><a href="<?php echo base_url('index.php/user/login')?>" class="text-white">Exports</a></p>
                    <p><a href="<?php echo base_url('user/login')?>" class="text-white">Project Cargo</a></p>
                    <p><a href="<?php echo base_url('user/login')?>" class="text-white">Consultation</a></p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                    <h4>Useful links</h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p><a href="<?php echo base_url('Homepage')?>" class="text-white">Home</a></p>
                    <p><a href="<?php echo base_url('Homepage/about')?>" class="text-white">About Us</a></p>
                    <p><a href="<?php echo base_url('Homepage/services')?>" class="text-white">Services</a></p>
                    <p><a href="<?php echo base_url('Homepage/contact')?>" class="text-white">Contact</a></p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h4>Contact</h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p><i class="fa fa-home mr-3"></i> 66/22, Fortune Terrace, Pannipitiya</p>
                    <p><i class="fa fa-envelope mr-3"></i> tgl@yahoo.com</p>
                    <p><i class="fa fa-phone mr-3"></i> + 98 765 432 11</p>
                    <p><i class="fa fa-print mr-3"></i> + 98 765 432 10</p>
                </div>

            </div>
        </div>
        <!-- Footer Links-->

        <hr class="bg-white mx-4 mt-2 mb-1">

        <!-- Copyright-->
        <div class="container-fluid">
            <p class="text-center m-0 py-1">
                © 2019 Copyright <a href="<?php echo base_url('Homepage')?>" class="text-white">TRANS GLOBAL LOGISTICS</a>
            </p>
        </div>
        <!-- Copyright -->

    </footer>
</html>