<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
<h2><?php echo $title; ?></h2>

<br>
<div class="col-lg-10 col-lg-10">
    <br><br>
    <div class="bs-example">
        <?php if($title == "Import Request"): ?>
            <?php foreach($hire as $row): ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <h6>Customer Name</h6><br><p><?php echo $row['c_name']; ?></p> </li>
                    <li class="list-group-item"> <h6>Container Type</h6> <br><p><?php echo $row['container_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Date</h6> <br><p><?php echo $row['container_pickup_datetime']; ?></p></li>
                    <li class="list-group-item"> <h6>Container Location</h6> <br><p><?php echo $row['container_pickup_location']; ?></p></li>
                    <li class="list-group-item"> <h6>Loading Port</h6> <br><p><?php echo $row['loading_port']; ?></p></li>
                    <li class="list-group-item"> <h6>Vessel Arrival Date</h6> <br><p><?php echo $row['vessel_arrival_datetime']; ?></p></li>
                    <li class="list-group-item"> <h6>Destination</h6> <br><p><?php echo $row['destination']; ?></p></li>
                    <li class="list-group-item"> <h6>Cargo Type</h6> <br><p><?php echo $row['cargo_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Weight</h6> <br><p><?php echo $row['weight']; ?></p></li>
                    <li class="list-group-item"> <h6>Notes</h6> <br><p><?php echo $row['notes']; ?></p></li>
                </ul>
            <?php endforeach; ?> 
        <?php else: ?>
            <?php foreach($hire as $row): ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <h6>Customer Name</h6><br><p><?php echo $row['c_name']; ?></p></li>
                    <li class="list-group-item"> <h6>Container Type</h6> <br><p><?php echo $row['container_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Date</h6> <br><p><?php echo $row['pickup_datetime']; ?></p></li>
                    <li class="list-group-item"> <h6>Container Location</h6> <br><p><?php echo $row['pickup_location']; ?></p></li>
                    <li class="list-group-item"> <h6>Loading Port</h6> <br><p><?php echo $row['loading_port']; ?></p></li>
                    <li class="list-group-item"> <h6>Cargo Type</h6> <br><p><?php echo $row['cargo_type']; ?></p></li>
                    <li class="list-group-item"> <h6>Weight</h6> <br><p><?php echo $row['weight']; ?></p></li>
                    <li class="list-group-item"> <h6>Notes</h6> <br><p><?php echo $row['notes']; ?></p></li>
                </ul>
            <?php endforeach; ?> 
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
                    <td>12345</td>
                    <td>12345</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete">Assign</button>
                    </td>
                </tr>
                <?php endforeach;?>          
            </tbody>
        </table>
        <br><br>
        <div>
            <textarea rows="4" cols="100">Remarks</textarea>
        </div>
        
        <button class="btn btn-danger">Decline Request</button>
    </div>
</div>