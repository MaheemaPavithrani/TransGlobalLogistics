<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
<br><br>
    <h2 class="text-center"><?php echo $title; ?></h2>
    <br>
    <?php if(!$driver_imports && !$driver_exports):?>
        <h5 class="text-center">No Past Hires</h5>
    <?php else: ?>
        <?php if($driver_imports): ?>
            <h2>Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Vehicle</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($driver_imports as $import): ?>
                    <tr>
                    <td><?php echo $import['c_name']; ?></td>
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
                                data-customer = "<?php echo $import['c_name']; ?>"
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
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="driver_containerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="driver_containerPickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br><p id="driver_containerPickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loaded Port</h6> <br><p id="driver_loadingPort"></p></li>
                        <li class="list-group-item"> <h6>Vessel Arrived Date</h6> <br><p id="driver_arrivalDate"></p></li>
                        <li class="list-group-item"> <h6>Destination</h6> <br><p id="driver_destination"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="driver_cargoType"></p></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br><p id="driver_weight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br><p id="driver_notes"></li>
                        <li class="list-group-item"> <h6>Customer</h6> <br><p id="driver_customer"></li>
                        <li class="list-group-item"> <h6>Lorry Number</h6> <br><p id="driver_lorry"></p></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($driver_exports):?>
            <h2>Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Driver</th>
                    <th>Vehicle</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($driver_exports as $export): ?>
                    <tr>
                    <td><?php echo $export['c_name']; ?></td>
                    <td><?php echo $export['v_no']; ?></td>
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td>
                        <button type="button" class="view-details-exports btn btn-primary" data-toggle="modal" data-target="#more"
                                data-customer = "<?php echo $export['c_name']; ?>"
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
                        <li class="list-group-item"> <h6>Customer Name</h6><br> <p id="driver_excustomer"></p></li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="driver_excontainerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="driver_expickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <p id="driver_expickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loaded Port</h6> <br> <p id="driver_exloadingPort"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="driver_excargoType"></p> </li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <p id="driver_exweight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <p id="driver_exnotes"></p></li>
                        <li class="list-group-item"> <h6>Lorry Number</h6> <br><p id="driver_exlorry"></p></li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>


    <script>
        var btns = document.querySelectorAll('.view-details-imports')

        btns.forEach(element => {

            element.addEventListener('click', function(event) {
                document.querySelector('.modal-body #driver_customer').innerHTML = event.target.attributes['data-customer'].value;
                document.querySelector('.modal-body #driver_containerType').innerHTML = event.target.attributes['data-containerType'].value;
                document.querySelector('.modal-body #driver_containerPickupTime').innerHTML= event.target.attributes['data-containerPickupTime'].value;
                document.querySelector('.modal-body #driver_containerPickupLocation').innerHTML = event.target.attributes['data-containerPickupLocation'].value;
                document.querySelector('.modal-body #driver_loadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
                document.querySelector('.modal-body #driver_arrivalDate').innerHTML= event.target.attributes['data-arrivalDate'].value;
                document.querySelector('.modal-body #driver_destination').innerHTML = event.target.attributes['data-destination'].value;
                document.querySelector('.modal-body #driver_cargoType').innerHTML = event.target.attributes['data-cargoType'].value;
                document.querySelector('.modal-body #driver_weight').innerHTML = event.target.attributes['data-weight'].value;
                document.querySelector('.modal-body #driver_notes').innerHTML = event.target.attributes['data-notes'].value;    
                document.querySelector('.modal-body #driver_lorry').innerHTML = event.target.attributes['data-lorry'].value;   
            })
        })

        var btnsExp = document.querySelectorAll('.view-details-exports')

        btnsExp.forEach(element => {

            element.addEventListener('click', function(event) {
                document.querySelector('.modal-body #driver_excustomer').innerHTML = event.target.attributes['data-customer'].value;
                document.querySelector('.modal-body #driver_excontainerType').innerHTML = event.target.attributes['data-containerType'].value;
                document.querySelector('.modal-body #driver_expickupTime').innerHTML= event.target.attributes['data-pickupTime'].value;
                document.querySelector('.modal-body #driver_expickupLocation').innerHTML = event.target.attributes['data-pickupLocation'].value;
                document.querySelector('.modal-body #driver_exloadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
                document.querySelector('.modal-body #driver_excargoType').innerHTML = event.target.attributes['data-cargoType'].value;
                document.querySelector('.modal-body #driver_exweight').innerHTML = event.target.attributes['data-weight'].value;
                document.querySelector('.modal-body #driver_exnotes').innerHTML = event.target.attributes['data-notes'].value;
                document.querySelector('.modal-body #driver_exlorry').innerHTML = event.target.attributes['data-lorry'].value; 
            })
        })
    </script>