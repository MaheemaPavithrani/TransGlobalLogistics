<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
<h2><?php echo $title; ?></h2>

<br>
<div class="col-lg-10 col-lg-10">
    <br><br>
    <div class="bs-example">
        <?php if($title == "Import Request"): ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <h6>Customer Name</h6><br><p><?php echo $hire['c_name']; ?></p> </li>
                    <li class="list-group-item"> <h6>Container Type</h6> <br><p><?php echo $hire['container_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Date</h6> <br><p><?php echo $hire['container_pickup_datetime']; ?></p></li>
                    <li class="list-group-item"> <h6>Container Location</h6> <br><p><?php echo $hire['container_pickup_location']; ?></p></li>
                    <li class="list-group-item"> <h6>Loading Port</h6> <br><p><?php echo $hire['loading_port']; ?></p></li>
                    <li class="list-group-item"> <h6>Vessel Arrival Date</h6> <br><p><?php echo $hire['vessel_arrival_datetime']; ?></p></li>
                    <li class="list-group-item"> <h6>Destination</h6> <br><p><?php echo $hire['destination']; ?></p></li>
                    <li class="list-group-item"> <h6>Cargo Type</h6> <br><p><?php echo $hire['cargo_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Weight</h6> <br><p><?php echo $hire['weight']; ?></p></li>
                    <li class="list-group-item"> <h6>Notes</h6> <br><p><?php echo $hire['notes']; ?></p></li>
                </ul>
                <?php $hire_id = 'imports/'.$hire['id'];?>
        <?php else: ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <h6>Customer Name</h6><br><p><?php echo $hire['c_name']; ?></p></li>
                    <li class="list-group-item"> <h6>Container Type</h6> <br><p><?php echo $hire['container_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Date</h6> <br><p><?php echo $hire['pickup_datetime']; ?></p></li>
                    <li class="list-group-item"> <h6>Container Location</h6> <br><p><?php echo $hire['pickup_location']; ?></p></li>
                    <li class="list-group-item"> <h6>Loading Port</h6> <br><p><?php echo $hire['loading_port']; ?></p></li>
                    <li class="list-group-item"> <h6>Cargo Type</h6> <br><p><?php echo $hire['cargo_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Weight</h6> <br><p><?php echo $hire['weight']; ?></p></li>
                    <li class="list-group-item"> <h6>Notes</h6> <br><p><?php echo $hire['notes']; ?></p></li>
                </ul>
                <?php $hire_id = 'exports/'.$hire['id'];?>
        <?php endif; ?>
    </div>
    <br><br>
    <div style="padding-top:10px">
        <h2>Available Drivers</h2>
    </div>
    <br>
    <div class="bs-example">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>License No</th>
                    <th>Mobile</th>
                    <th>Vehicle No</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($drivers as $driver): ?>
                <tr>
                    <td><?php echo $driver['name']; ?></td>
                    <td><?php echo $driver['license_no']; ?></td>
                    <td><?php echo $driver['mobile'];?></td>
                    <td><?php echo $driver['lorry_no'];?></td>
                    <td><a href="<?php echo base_url('admin/assign_driver/'.$hire_id.'/'.$driver['id'])?>" class="btn btn-primary">Assign</a>
                    </td>
                </tr>
                <?php endforeach;?>          
            </tbody>
        </table>
        <br><br>
        <?php echo form_open('admin/decline_hire/'.$hire_id)?>
            <div class="form-group">
                <textarea rows="4" cols="100" class="form-control" name="message" placeholder="Remarks" required></textarea>
            </div>
            <input type="hidden" value="<?php echo $hire['c_id']; ?>" name="customer">
            <button type="submit" class="btn btn-danger">Decline Request</button>
        </form>
    </div>
</div>