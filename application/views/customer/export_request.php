<div class="row" style="width:100%">

    <div class="image-wrapper col-md-3" style="overflow:hidden">
        <img src="https://www.faxination.com/wp-content/uploads/2016/10/1960x980-logistics1-1024x1024.jpg" alt="">
    </div>
<div class="col-md-9">
    <br><br><br><br><br>
    <h2 class="text-center"><?php echo $title; ?></h2>
    <br><br>
    <?php echo validation_errors();?>

    <?php echo form_open('customer/send_export_request')?>
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                    <label>Container Type</label>
                    <select class="form-control" name="container_type" id="type" required>
                        <option value="20ft">20ft</option>
                        <option value="40ft">40ft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pickup Date and Time</label>
                    <input type="datetime-local" class="form-control" name="pickup_datetime" placeholder="Date and Time" required>
                </div>
                <div class="form-group">
                    <label>Pickup Location</label>
                    <input type="text" class="form-control" name="pickup_location" placeholder="Cargo Location" required>
                </div>
                <div class="form-group">
                    <label>Loading Port</label>
                    <input type="text" class="form-control" name="loading_port" placeholder="Loading Port" required>
                </div>
                <div class="form-group">
                    <label>Cargo Type</label>
                    <input type="text" class="form-control" name="cargo_type" placeholder="Cargo Type" required>
                </div>
                <div class="form-group">
                    <label>Weight</label>
                    <input type="text" class="form-control" name="weight" placeholder="Weight" required>
                </div>
                <div class="form-group">
                    <label>Notes</label>
                    <input type="text" class="form-control" name="notes" placeholder="Notes" required>
                </div>
                <input type="hidden" value=<?php echo $customer["id"]; ?> name="customer_id">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>