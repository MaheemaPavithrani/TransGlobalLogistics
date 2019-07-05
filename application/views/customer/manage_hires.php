<div class="row" style="width:100%">

<div class="image-wrapper col-md-2" style="overflow:hidden; height:100%; background-repeat:repeat">
    <img src="http://cdn.osxdaily.com/wp-content/uploads/2014/05/galactic-clouds-spacey.jpg" alt="" style="height:2700px">
</div>
<div class="col-md-10">

    <!-- Ongoing Hires -->
    <br><br><br><br><br>
    <h2 class="text-center"><?php echo $ongoing_hires; ?></h2>
    <br>
    <?php if(!$ongoing_imports && !$ongoing_exports):?>
        <h5 class="text-center">No Ongoing Hires</h5>
    <?php else: ?>
        <?php if($ongoing_imports): ?>
            <h2>Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Import ID</th>
                    <th>Assigned Driver</th>
                    <th>Vehicle</th>
                    <th>Driver Mobile</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($ongoing_imports as $import): ?>
                    <tr>
                    <td><?php echo $import['id']; ?></td>
                    <td><?php echo $import['d_name']; ?></td>
                    <td><?php echo $import['v_no']; ?></td>
                    <td><?php echo $import['d_mob']; ?></td>
                    <td><?php echo $import['container_type']; ?></td>
                    <td><?php echo $import['container_pickup_datetime']; ?></td>
                    <td><?php echo $import['cargo_type']; ?></td>
                    <td><?php echo $import['destination']; ?></td>
                    <td>
                        <button type="button" class="view-details-imports btn btn-primary" data-toggle="modal" data-target="#ongoing_more_details"
                                data-containerType = "<?php echo $import['container_type']; ?>"
                                data-containerPickupTime = "<?php echo $import['container_pickup_datetime']; ?>"
                                data-containerPickupLocation = "<?php echo $import['container_pickup_location']; ?>"
                                data-loadingPort = "<?php echo $import['loading_port']; ?>"
                                data-arrivalDate = "<?php echo $import['vessel_arrival_datetime']; ?>"
                                data-destination = "<?php echo $import['destination']; ?>"
                                data-cargoType = "<?php echo $import['cargo_type']; ?>"
                                data-weight = "<?php echo $import['weight']; ?>"
                                data-notes = "<?php echo $import['notes']; ?>"
                                data-driver = "<?php echo $import['d_name']; ?>"
                                data-mob = "<?php echo $import['d_mob']; ?>"
                                data-lorry = "<?php echo $import['v_no']; ?>"
                            >More
                        </button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="modal fade" id="ongoing_more_details">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="ongoing_containerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="ongoing_containerPickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br><p id="ongoing_containerPickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br><p id="ongoing_loadingPort"></p></li>
                        <li class="list-group-item"> <h6>Vessel Arrival Date</h6> <br><p id="ongoing_arrivalDate"></p></li>
                        <li class="list-group-item"> <h6>Destination</h6> <br><p id="ongoing_destination"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="ongoing_cargoType"></p></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br><p id="ongoing_weight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br><p id="ongoing_notes"></li>
                        <li class="list-group-item"> <h6>Driver Assigned</h6> <br> <p id="ongoing_driver"></p></li>
                        <li class="list-group-item"> <h6>Driver Mobile</h6> <br> <p id="ongoing_driverMob"></p></li>
                        <li class="list-group-item"> <h6>Lorry Number</h6> <br><p id="ongoing_lorry"></p></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($ongoing_exports):?>
            <h2>Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Export ID</th>
                    <th>Assigned Driver</th>
                    <th>Driver Mobile</th>
                    <th>Vehicle</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($ongoing_exports as $export): ?>
                    <tr>
                    <td><?php echo $export['id']; ?></td>
                    <td><?php echo $export['d_name']; ?></td>
                    <td><?php echo $export['d_mob']; ?></td>
                    <td><?php echo $export['v_no']; ?></td>
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td>
                        <button type="button" class="view-details-exports btn btn-primary" data-toggle="modal" data-target="#ongoing_more"
                                data-containerType = "<?php echo $export['container_type']; ?>"
                                data-pickupTime = "<?php echo $export['pickup_datetime']; ?>"
                                data-pickupLocation = "<?php echo $export['pickup_location']; ?>"
                                data-loadingPort = "<?php echo $export['loading_port']; ?>"
                                data-cargoType = "<?php echo $export['cargo_type']; ?>"
                                data-weight = "<?php echo $export['weight']; ?>"
                                data-notes = "<?php echo $export['notes']; ?>"
                                data-driver = "<?php echo $export['d_name']; ?>"
                                data-mob = "<?php echo $export['d_mob']; ?>"
                                data-lorry = "<?php echo $export['v_no']; ?>"
                            >More
                        </button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="modal fade" id="ongoing_more">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="ongoing_excontainerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="ongoing_expickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <p id="ongoing_expickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br> <p id="ongoing_exloadingPort"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="ongoing_excargoType"></p> </li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <p id="ongoing_exweight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <p id="ongoing_exnotes"></p></li>
                        <li class="list-group-item"> <h6>Driver Assigned</h6> <br> <p id="ongoing_exdriver"></p></li>
                        <li class="list-group-item"> <h6>Driver Mobile</h6> <br> <p id="ongoing_exdriverMob"></p></li>
                        <li class="list-group-item"> <h6>Lorry Number</h6> <br><p id="ongoing_exlorry"></p></li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Ongoing Hires -->


    <!-- Hire Requests -->

    <br><br><hr><br><br>
    <h2 class="text-center"><?php echo $hire_requests; ?></h2>
    <br>
    <?php if(!$import_requests && !$export_requests):?>
        <h5 class="text-center">No New Hire Requests</h5>
    <?php else: ?>
        <?php if($import_requests): ?>
            <h2>Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Import ID</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Container Location</th>
                    <th>Loading Port</th>
                    <th>Vessel Arrival</th>
                    <th>Cargo Type</th>
                    <th>Weight</th>
                    <th>Destination</th>
                    <th>Notes</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($import_requests as $import): ?>
                    <tr>
                    <td><?php echo $import['id']; ?></td>
                    <td><?php echo $import['container_type']; ?></td>
                    <td><?php echo $import['container_pickup_datetime']; ?></td>
                    <td><?php echo $import['container_pickup_location']; ?></td>
                    <td><?php echo $import['loading_port']; ?></td>
                    <td><?php echo $import['vessel_arrival_datetime']; ?></td>
                    <td><?php echo $import['cargo_type']; ?></td>
                    <td><?php echo $import['weight']; ?></td>
                    <td><?php echo $import['destination']; ?></td>
                    <td><?php echo $import['notes']; ?></td>
                    <td><button type="button" class="my_delete btn btn-danger" data-toggle="modal" data-id="<?=$import['id'];?>" data-target="#my_delete">Delete</button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        <?php endif; ?>
        <div class="modal fade" id="my_delete">
            <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                Are you sure you want to delete this Import request?
                </div>

                <div class="modal-footer">
                <input type="hidden" id="delete-action" value="<?php echo base_url('Customer/delete_hire/imports/');?>">  
                <a href="http" id="delete-hire" class="btn btn-danger" role="button">Delete</a> 
                </div>
            </div>
            </div>
        </div>
        <script>
            var del = document.querySelectorAll('.my_delete');

            del.forEach(element =>{
                element.addEventListener('click',function(event){
                    var n = (document.querySelector('.modal-footer #delete-action').value + event.target.attributes['data-id'].value)
                    document.querySelector('.modal-footer #delete-hire').href=n;      
                })
            })
        </script>
        <?php if($export_requests):?>
            <h2>Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Export ID</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Loading Port</th>
                    <th>Cargo Type</th>
                    <th></th>
                    <th>Weight</th>
                    <th></th>
                    <th>Notes</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($export_requests as $export): ?>
                    <tr>
                    <td><?php echo $export['id']; ?></td>
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['loading_port']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td></td>
                    <td><?php echo $export['weight']; ?></td>
                    <td></td>
                    <td><?php echo $export['notes']; ?></td>
                    <td>
                        <button type="button" class="export_delete btn btn-danger" data-toggle="modal" data-id="<?=$export['id'];?>" data-target="#export_delete">Delete</button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>

    <div class="modal fade" id="export_delete">
        <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
            Are you sure you want to delete this Export request?
            </div>

            <div class="modal-footer">
            <input type="hidden" id="ex_delete-action" value="<?php echo base_url('Customer/delete_hire/exports/');?>">  
            <a href="http" id="ex_delete-hire" class="btn btn-danger" role="button">Delete</a> 
            </div>
        </div>
        </div>
    </div>
    <script>
        var exdel = document.querySelectorAll('.export_delete');

        exdel.forEach(element =>{
            element.addEventListener('click',function(event){
                var n = (document.querySelector('.modal-footer #ex_delete-action').value + event.target.attributes['data-id'].value)
                document.querySelector('.modal-footer #ex_delete-hire').href=n;      
            })
        })
    </script>

    <!-- Hire Requests -->



    <!-- Past Hires -->

    <br><br><hr><br><br>
    <h2 class="text-center"><?php echo $past_title; ?></h2>
    <br>
    <?php if(!$past_imports && !$past_exports):?>
        <h5 class="text-center">No Past Hires</h5>
    <?php else: ?>
        <?php if($past_imports): ?>
            <h2>Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Import ID</th>
                    <th>Driver</th>
                    <th>Driver Mobile</th>
                    <th>Vehicle</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($past_imports as $import): ?>
                    <tr>
                    <td><?php echo $import['id']; ?></td>
                    <td><?php echo $import['d_name']; ?></td>
                    <td><?php echo $import['d_mob']; ?></td>
                    <td><?php echo $import['v_no']; ?></td>
                    <td><?php echo $import['container_type']; ?></td>
                    <td><?php echo $import['container_pickup_datetime']; ?></td>
                    <td><?php echo $import['cargo_type']; ?></td>
                    <td><?php echo $import['destination']; ?></td>
                    <td>
                        <button type="button" class="view-details-imports btn btn-primary" data-toggle="modal" data-target="#more_details"
                                data-containerType = "<?php echo $import['container_type']; ?>"
                                data-containerPickupTime = "<?php echo $import['container_pickup_datetime']; ?>"
                                data-containerPickupLocation = "<?php echo $import['container_pickup_location']; ?>"
                                data-loadingPort = "<?php echo $import['loading_port']; ?>"
                                data-arrivalDate = "<?php echo $import['vessel_arrival_datetime']; ?>"
                                data-destination = "<?php echo $import['destination']; ?>"
                                data-cargoType = "<?php echo $import['cargo_type']; ?>"
                                data-weight = "<?php echo $import['weight']; ?>"
                                data-notes = "<?php echo $import['notes']; ?>"
                                data-lorry = "<?php echo $import['v_no']; ?>"
                                data-driver = "<?php echo $import['d_name']; ?>"
                            >More
                        </button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="modal fade" id="more_details">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="past_containerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="past_containerPickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br><p id="past_containerPickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loaded Port</h6> <br><p id="past_loadingPort"></p></li>
                        <li class="list-group-item"> <h6>Vessel Arrived Date</h6> <br><p id="past_arrivalDate"></p></li>
                        <li class="list-group-item"> <h6>Destination</h6> <br><p id="past_destination"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="past_cargoType"></p></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br><p id="past_weight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br><p id="past_notes"></li>
                        <li class="list-group-item"> <h6>Driver</h6> <br><p id="past_driver"></li>
                        <li class="list-group-item"> <h6>Lorry Number</h6> <br><p id="past_lorry"></p></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($past_exports):?>
            <h2>Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Export ID</th>
                    <th>Driver</th>
                    <th>Driver Mobile</th>
                    <th>Vehicle</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($past_exports as $export): ?>
                    <tr>
                    <td><?php echo $export['id']; ?></td> 
                    <td><?php echo $export['d_name']; ?></td>
                    <td><?php echo $export['d_mob']; ?></td>
                    <td><?php echo $export['v_no']; ?></td>
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td>
                        <button type="button" class="view-details-exports btn btn-primary" data-toggle="modal" data-target="#more"
                                data-driver = "<?php echo $export['d_name']; ?>"
                                data-containerType = "<?php echo $export['container_type']; ?>"
                                data-pickupTime = "<?php echo $export['pickup_datetime']; ?>"
                                data-pickupLocation = "<?php echo $export['pickup_location']; ?>"
                                data-loadingPort = "<?php echo $export['loading_port']; ?>"
                                data-cargoType = "<?php echo $export['cargo_type']; ?>"
                                data-weight = "<?php echo $export['weight']; ?>"
                                data-notes = "<?php echo $export['notes']; ?>"
                                data-lorry = "<?php echo $export['v_no']; ?>"
                            >More
                        </button>
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
                        <li class="list-group-item"> <h6>Driver Name</h6><br> <p id="past_exdriver"></p></li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="past_excontainerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="past_expickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <p id="past_expickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loaded Port</h6> <br> <p id="past_exloadingPort"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="past_excargoType"></p> </li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <p id="past_exweight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <p id="past_exnotes"></p></li>
                        <li class="list-group-item"> <h6>Lorry Number</h6> <br><p id="past_exlorry"></p></li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Past Hires -->


    <!-- Rejected Hires -->

    <br><br><hr><br><br>
    <h2 class="text-center"><?php echo $rejected_hires; ?></h2>
    <br>
    <?php if(!$rejected_imports && !$rejected_exports):?>
        <h5 class="text-center">No RejectedHires</h5>
    <?php else: ?>
        <?php if($rejected_imports): ?>
            <h2>Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Import ID</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th>Reject Message</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($rejected_imports as $import): ?>
                    <tr>
                    <td><?php echo $import['id']; ?></td>
                    <td><?php echo $import['container_type']; ?></td>
                    <td><?php echo $import['container_pickup_datetime']; ?></td>
                    <td><?php echo $import['cargo_type']; ?></td>
                    <td><?php echo $import['destination']; ?></td>
                    <td><?php echo $import['message']; ?></td>
                    <td>
                        <button type="button" class="view-details-imports btn btn-primary" data-toggle="modal" data-target="#rejected_details"
                                data-containerType = "<?php echo $import['container_type']; ?>"
                                data-containerPickupTime = "<?php echo $import['container_pickup_datetime']; ?>"
                                data-containerPickupLocation = "<?php echo $import['container_pickup_location']; ?>"
                                data-loadingPort = "<?php echo $import['loading_port']; ?>"
                                data-arrivalDate = "<?php echo $import['vessel_arrival_datetime']; ?>"
                                data-destination = "<?php echo $import['destination']; ?>"
                                data-cargoType = "<?php echo $import['cargo_type']; ?>"
                                data-weight = "<?php echo $import['weight']; ?>"
                                data-notes = "<?php echo $import['notes']; ?>"
                            >More
                        </button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="modal fade" id="rejected_details">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="rejected_containerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="rejected_containerPickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br><p id="rejected_containerPickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loaded Port</h6> <br><p id="rejected_loadingPort"></p></li>
                        <li class="list-group-item"> <h6>Vessel Arrived Date</h6> <br><p id="rejected_arrivalDate"></p></li>
                        <li class="list-group-item"> <h6>Destination</h6> <br><p id="rejected_destination"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="rejected_cargoType"></p></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br><p id="rejected_weight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br><p id="rejected_notes"></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($rejected_exports):?>
            <h2>Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Export ID</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th>Reject Message</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($rejected_exports as $export): ?>
                    <tr>
                    <td><?php echo $export['id']; ?></td> 
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td><?php echo $export['message']; ?></td>
                    <td>
                        <button type="button" class="view-details-exports btn btn-primary" data-toggle="modal" data-target="#rejected_more"
                                data-containerType = "<?php echo $export['container_type']; ?>"
                                data-pickupTime = "<?php echo $export['pickup_datetime']; ?>"
                                data-pickupLocation = "<?php echo $export['pickup_location']; ?>"
                                data-loadingPort = "<?php echo $export['loading_port']; ?>"
                                data-cargoType = "<?php echo $export['cargo_type']; ?>"
                                data-weight = "<?php echo $export['weight']; ?>"
                                data-notes = "<?php echo $export['notes']; ?>"
                            >More
                        </button>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="modal fade" id="rejected_more">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="rejected_excontainerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="rejected_expickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <p id="rejected_expickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loaded Port</h6> <br> <p id="rejected_exloadingPort"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="rejected_excargoType"></p> </li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <p id="rejected_exweight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <p id="rejected_exnotes"></p></li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Rejected Hires -->


</div>
<br><br><br><br>



    <script type="text/javascript">

    //Ongoing Hires

    var ongoing_btns = document.querySelectorAll('.view-details-imports')

    ongoing_btns.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #ongoing_containerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #ongoing_containerPickupTime').innerHTML= event.target.attributes['data-containerPickupTime'].value;
        document.querySelector('.modal-body #ongoing_containerPickupLocation').innerHTML = event.target.attributes['data-containerPickupLocation'].value;
        document.querySelector('.modal-body #ongoing_loadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #ongoing_arrivalDate').innerHTML= event.target.attributes['data-arrivalDate'].value;
        document.querySelector('.modal-body #ongoing_destination').innerHTML = event.target.attributes['data-destination'].value;
        document.querySelector('.modal-body #ongoing_cargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #ongoing_weight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #ongoing_notes').innerHTML = event.target.attributes['data-notes'].value;
        document.querySelector('.modal-body #ongoing_driver').innerHTML = event.target.attributes['data-driver'].value;
        document.querySelector('.modal-body #ongoing_driverMob').innerHTML = event.target.attributes['data-mob'].value;
        document.querySelector('.modal-body #ongoing_lorry').innerHTML = event.target.attributes['data-lorry'].value; 
      })
    })

    var ongoing_btnsExp = document.querySelectorAll('.view-details-exports')

    ongoing_btnsExp.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #ongoing_excontainerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #ongoing_expickupTime').innerHTML= event.target.attributes['data-pickupTime'].value;
        document.querySelector('.modal-body #ongoing_expickupLocation').innerHTML = event.target.attributes['data-pickupLocation'].value;
        document.querySelector('.modal-body #ongoing_exloadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #ongoing_excargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #ongoing_exweight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #ongoing_exnotes').innerHTML = event.target.attributes['data-notes'].value;
        document.querySelector('.modal-body #ongoing_exdriver').innerHTML = event.target.attributes['data-driver'].value;
        document.querySelector('.modal-body #ongoing_exdriverMob').innerHTML = event.target.attributes['data-mob'].value;
        document.querySelector('.modal-body #ongoing_exlorry').innerHTML = event.target.attributes['data-lorry'].value;
      })
    })


    // Past Hires

    var btns = document.querySelectorAll('.view-details-imports')

    btns.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #past_driver').innerHTML = event.target.attributes['data-driver'].value;
        document.querySelector('.modal-body #past_containerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #past_containerPickupTime').innerHTML= event.target.attributes['data-containerPickupTime'].value;
        document.querySelector('.modal-body #past_containerPickupLocation').innerHTML = event.target.attributes['data-containerPickupLocation'].value;
        document.querySelector('.modal-body #past_loadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #past_arrivalDate').innerHTML= event.target.attributes['data-arrivalDate'].value;
        document.querySelector('.modal-body #past_destination').innerHTML = event.target.attributes['data-destination'].value;
        document.querySelector('.modal-body #past_cargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #past_weight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #past_notes').innerHTML = event.target.attributes['data-notes'].value;    
        document.querySelector('.modal-body #past_lorry').innerHTML = event.target.attributes['data-lorry'].value;   
      })
    })

    var btnsExp = document.querySelectorAll('.view-details-exports')

    btnsExp.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #past_exdriver').innerHTML = event.target.attributes['data-driver'].value;
        document.querySelector('.modal-body #past_excontainerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #past_expickupTime').innerHTML= event.target.attributes['data-pickupTime'].value;
        document.querySelector('.modal-body #past_expickupLocation').innerHTML = event.target.attributes['data-pickupLocation'].value;
        document.querySelector('.modal-body #past_exloadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #past_excargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #past_exweight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #past_exnotes').innerHTML = event.target.attributes['data-notes'].value;
        document.querySelector('.modal-body #past_exlorry').innerHTML = event.target.attributes['data-lorry'].value; 
      })
    })    


    // Rejected Hires

    var rejected_btns = document.querySelectorAll('.view-details-imports')

    rejected_btns.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #rejected_containerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #rejected_containerPickupTime').innerHTML= event.target.attributes['data-containerPickupTime'].value;
        document.querySelector('.modal-body #rejected_containerPickupLocation').innerHTML = event.target.attributes['data-containerPickupLocation'].value;
        document.querySelector('.modal-body #rejected_loadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #rejected_arrivalDate').innerHTML= event.target.attributes['data-arrivalDate'].value;
        document.querySelector('.modal-body #rejected_destination').innerHTML = event.target.attributes['data-destination'].value;
        document.querySelector('.modal-body #rejected_cargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #rejected_weight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #rejected_notes').innerHTML = event.target.attributes['data-notes'].value;     
      })
    })

    var rejected_btnsExp = document.querySelectorAll('.view-details-exports')

    rejected_btnsExp.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #rejected_excontainerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #rejected_expickupTime').innerHTML= event.target.attributes['data-pickupTime'].value;
        document.querySelector('.modal-body #rejected_expickupLocation').innerHTML = event.target.attributes['data-pickupLocation'].value;
        document.querySelector('.modal-body #rejected_exloadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #rejected_excargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #rejected_exweight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #rejected_exnotes').innerHTML = event.target.attributes['data-notes'].value;
      })
    })



  </script>





    



    