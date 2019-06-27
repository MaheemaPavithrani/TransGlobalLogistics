<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
    <?php echo validation_errors();?>

    <?php echo form_open('admin/add_vehicle')?>
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                <h1 class="text-center"><?php echo $title; ?></h1>
                <div class="form-group">
                    <label>Vehicle Number</label>
                    <input type="text" class="form-control" name="vehicle_no" placeholder="Vehicle Number">
                </div>
                <div class="form-group">
                    <label>Trailer No</label>
                    <input type="text" class="form-control" name="trailer_no" placeholder="Trailer Number">
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <input type="text" class="form-control" name="model" placeholder="Model">
                </div>
                <div class="form-group">
                    <label>Milage</label>
                    <input type="text" class="form-control" name="nmilage" placeholder="Milage">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>