
<div class="container bootstrap snippet">
    <br>
    <div class="row">
        <div class="col-sm-10">
            <h1>Administrator</h1></div>
        <div class="col-sm-2">
            <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">

            <ul >
                <a href="#settings" data-toggle="collapse" class="btn btn-primary">Details</a>
                <a href="<?php echo base_url('Homepage'); ?>" class="btn btn-danger">Logout</a>
            </ul>

            <div class="tab-content"> 
                <div class="collapse" id="settings">

                    <hr>
                    <?php echo form_open('admin/update_profile')?>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="name">
                                    <h4>Name</h4></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $profile['name'];?>" value="<?php echo $profile['name'];?>" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="dob">
                                    <h4>Date of Birth</h4></label>
                                <input type="text" class="form-control" name="dob" id="dob" placeholder="<?php echo $profile['dob'];?>" value="<?php echo $profile['dob'];?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="<?php echo $profile['mobile'];?>" value="<?php echo $profile['mobile'];?>" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $profile['email'];?>" value="<?php echo $profile['email'];?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"> Update</button>
                            </div>
                        </div>
                    </form>
                        <br><br><hr>
                        <h3>Change Password</h3>
                        <br><br>
                    <?php echo form_open('User/update_password')?>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="old_password">
                                    <h4>Old Password</h4></label>
                                <input type="password" class="form-control" name="old_password" id="password" placeholder="Old Password" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="new_password">
                                    <h4>New Password</h4></label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="verify_password">
                                    <h4>Verify Passowrd</h4></label>
                                <input type="password" class="form-control" name="verify_password" id="verify_password" placeholder="Verify Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"> Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>