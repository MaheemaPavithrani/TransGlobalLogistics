<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
<h2><?php echo $title; ?></h2>
<br>
    <?php if(!$imports && !$exports):?>
        <h5 class="text-center">No New Hire Requests</h5>
    <?php else: ?>
        <?php if($imports): ?>
            <h2>Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($imports as $import): ?>
                    <tr>
                    <td><?php echo $import['c_name']; ?></td>
                    <td><?php echo $import['container_type']; ?></td>
                    <td><?php echo $import['container_pickup_datetime']; ?></td>
                    <td><?php echo $import['cargo_type']; ?></td>
                    <td><?php echo $import['destination']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view">View</button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="modal fade" id="view">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Customer Name</h6><br><?php echo $import['c_name']; ?> </li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <?php echo $import['container_type']; ?></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <?php echo $import['container_pickup_datetime']; ?></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <?php echo $import['container_pickup_location']; ?></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br> <?php echo $import['loading_port']; ?></li>
                        <li class="list-group-item"> <h6>Vessel Arrival Date</h6> <br> <?php echo $import['vessel_arrival_datetime']; ?></li>
                        <li class="list-group-item"> <h6>Destination</h6> <br> <?php echo $import['destination']; ?></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <?php echo $import['cargo_type']; ?></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <?php echo $import['weight']; ?></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <?php echo $import['notes']; ?></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($exports):?>
            <h2>Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($exports as $export): ?>
                    <tr>
                    <td><?php echo $export['c_name']; ?></td>
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#more">View</button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="modal fade" id="more">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Customer Name</h6><br><?php echo $export['c_name']; ?> </li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <?php echo $export['container_type']; ?></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <?php echo $export['pickup_datetime']; ?></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <?php echo $export['pickup_location']; ?></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br> <?php echo $export['loading_port']; ?></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <?php echo $export['cargo_type']; ?></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <?php echo $export['weight']; ?></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <?php echo $export['notes']; ?></li>
                        <!-- <li class="list-group-item"> <h6>Assign Driver</h6></li> -->
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-primary" role="button">Assign Driver</a>
                        <a href="" class="btn btn-danger" role="button">Delete</a>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    



    