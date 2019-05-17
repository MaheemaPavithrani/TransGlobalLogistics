<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
    <?php echo validation_errors();?>

    <?php echo form_open('admin/register_driver')?>
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                <h1 class="text-center"><?php echo $title; ?></h1>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>License No</label>
                    <input type="text" class="form-control" name="license_no" placeholder="License No">
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
                </div>
                <div class="form-group">
                    <label>NIC</label>
                    <input type="text" class="form-control" name="nic" placeholder="NIC No">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>