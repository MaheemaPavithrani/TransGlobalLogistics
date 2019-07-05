<br><br><br>
<div class="container container mt-4 mb-5">
<link rel="stylesheet" href="<?php echo base_url();?>css/registerstyle.css">
<section class="register-block">
    <div class="containers">
        <div class="row">
            <div class="col-md-4 register-sec">
                <h2 class="text-center">Register Now</h2>
                <?php echo validation_errors();?>
                <?php echo form_open('user/register_customer')?>
                    <div class="form-group">
                        <label for="exampleInputName1" class="text-uppercase">Name</label>
                        <input type="text" class="form-control" placeholder="" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress1" class="text-uppercase">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress2" class="text-uppercase">Date of Birth</label>
                        <input type="date" class="form-control" placeholder="" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTown1" class="text-uppercase">Email</label>
                        <input type="email" class="form-control" placeholder="" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCountry1" class="text-uppercase">Username</label>
                        <input type="text" class="form-control" placeholder="" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPostCode1" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" placeholder="" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername" class="text-uppercase">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="" name="password2" required>   
                    </div>
                    <input type="hidden" value="customer" name="user_type">
                    <div class="form-check">
                        <button type="submit" class="btn btn-register float-right">Submit</button>
                    </div>
                </form>

            </div>
            <div class="col-md-8 banner-sec"></div>
        </div>
    </div>
</section>
<br><br><br>