<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
<br><br>
  <h2>Ongoing Hire</h2>
  <br><br>
  <?php if(!$current_hire_import && !$current_hire_export):?>
      <h5 class="text-center">No Ongoing Hires</h5>
    <?php else: ?>
        <?php if($current_hire_import): ?>
            <h2 class="text-center">Import</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo $current_hire_import['c_name']; ?></td>
                    <td><?php echo $current_hire_import['c_mob']; ?></td>
                    <td><?php echo $current_hire_import['container_type']; ?></td>
                    <td><?php echo $current_hire_import['container_pickup_datetime']; ?></td>
                    <td><?php echo $current_hire_import['cargo_type']; ?></td>
                    <td><?php echo $current_hire_import['destination']; ?></td>
                    <td>
                        <button type="button" class="view-details-imports btn btn-primary" data-toggle="modal" data-target="#more_details"
                                data-customer = "<?php echo $current_hire_import['c_name']; ?>"
                                data-containerType = "<?php echo $current_hire_import['container_type']; ?>"
                                data-containerPickupTime = "<?php echo $current_hire_import['container_pickup_datetime']; ?>"
                                data-containerPickupLocation = "<?php echo $current_hire_import['container_pickup_location']; ?>"
                                data-loadingPort = "<?php echo $current_hire_import['loading_port']; ?>"
                                data-arrivalDate = "<?php echo $current_hire_import['vessel_arrival_datetime']; ?>"
                                data-destination = "<?php echo $current_hire_import['destination']; ?>"
                                data-cargoType = "<?php echo $current_hire_import['cargo_type']; ?>"
                                data-weight = "<?php echo $current_hire_import['weight']; ?>"
                                data-notes = "<?php echo $current_hire_import['notes']; ?>"
                            >More
                        </button>
                        <?php if($this->session->flashdata('hire_complete') == $current_hire_import['id'] ):?>
                            <a href="" class="btn btn-secondary">Completed</a>
                        <?php else:?>
                            <a href="<?php echo base_url('driver/complete_hire/imports/'.$current_hire_import['id']); ?>" class="btn btn-success">Completed</a>
                        <?php endif; ?>
                        
                    </td>
                    </tr>
                </tbody>
            </table>

            <div class="modal fade" id="more_details">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Customer Name</h6><br> <p id="customer"></p> </li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="containerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="containerPickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br><p id="containerPickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br><p id="loadingPort"></p></li>
                        <li class="list-group-item"> <h6>Vessel Arrival Date</h6> <br><p id="arrivalDate"></p></li>
                        <li class="list-group-item"> <h6>Destination</h6> <br><p id="destination"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="cargoType"></p></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br><p id="weight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br><p id="notes"></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($current_hire_export):?>
            <h2 class="text-center">Export</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo $current_hire_export['c_name']; ?></td>
                    <td><?php echo $current_hire_export['c_mob']; ?></td>
                    <td><?php echo $current_hire_export['container_type']; ?></td>
                    <td><?php echo $current_hire_export['pickup_datetime']; ?></td>
                    <td><?php echo $current_hire_export['pickup_location']; ?></td>
                    <td><?php echo $current_hire_export['cargo_type']; ?></td>
                    <td>
                        <button type="button" class="view-details-exports btn btn-primary" data-toggle="modal" data-target="#more"
                                data-customer = "<?php echo $current_hire_export['c_name']; ?>"
                                data-containerType = "<?php echo $current_hire_export['container_type']; ?>"
                                data-pickupTime = "<?php echo $current_hire_export['pickup_datetime']; ?>"
                                data-pickupLocation = "<?php echo $current_hire_export['pickup_location']; ?>"
                                data-loadingPort = "<?php echo $current_hire_export['loading_port']; ?>"
                                data-cargoType = "<?php echo $current_hire_export['cargo_type']; ?>"
                                data-weight = "<?php echo $current_hire_export['weight']; ?>"
                                data-notes = "<?php echo $current_hire_export['notes']; ?>"
                            >More
                        </button>
                        <?php if($this->session->flashdata('hire_complete') == $current_hire_export['id'] ):?>
                            <a href="" class="btn btn-secondary">Completed</a>
                        <?php else:?>
                            <a href="<?php echo base_url('driver/complete_hire/exports/'.$current_hire_export['id']); ?>" class="btn btn-success">Completed</a>
                        <?php endif; ?>
                    </td>
                    </tr>
                </tbody>
            </table>

            <div class="modal fade" id="more">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Customer Name</h6><br> <p id="excustomer"></p></li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="excontainerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="expickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <p id="expickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br> <p id="exloadingPort"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="excargoType"></p> </li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <p id="exweight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <p id="exnotes"></p></li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <br><br><hr><br><br>
    <h2>Upcoming Hires</h2>
    <br><br>

    <?php if(!$upcoming_imports && !$upcoming_exports):?>
        <h5 class="text-center">No Upcoming Hires</h5>
    <?php else: ?>
        <?php if($upcoming_imports): ?>
            <h2 class="text-center">Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($upcoming_imports as $import): ?>
                    <tr>
                    <td><?php echo $import['c_name']; ?></td>
                    <td><?php echo $import['c_mob']; ?></td>
                    <td><?php echo $import['container_type']; ?></td>
                    <td><?php echo $import['container_pickup_datetime']; ?></td>
                    <td><?php echo $import['cargo_type']; ?></td>
                    <td><?php echo $import['destination']; ?></td>
                    <td>
                        <button type="button" class="view-details-imports btn btn-primary" data-toggle="modal" data-target="#upcoming_more_details"
                                data-customer = "<?php echo $import['c_name']; ?>"
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

            <div class="modal fade" id="upcoming_more_details">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Customer Name</h6><br> <p id="upcoming_customer"></p> </li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="upcoming_containerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="upcoming_containerPickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br><p id="upcoming_containerPickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br><p id="upcoming_loadingPort"></p></li>
                        <li class="list-group-item"> <h6>Vessel Arrival Date</h6> <br><p id="upcoming_arrivalDate"></p></li>
                        <li class="list-group-item"> <h6>Destination</h6> <br><p id="upcoming_destination"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="upcoming_cargoType"></p></li>
                        <li class="list-group-item"> <h6>Weight</h6> <br><p id="upcoming_weight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br><p id="upcoming_notes"></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($upcoming_exports):?>
            <h2 class="text-center">Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($upcoming_exports as $export): ?>
                    <tr>
                    <td><?php echo $export['c_name']; ?></td>
                    <td><?php echo $export['c_mob']; ?></td>
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td>
                        <button type="button" class="view-details-exports btn btn-primary" data-toggle="modal" data-target="#upcoming_more"
                                data-customer = "<?php echo $export['c_name']; ?>"
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

            <div class="modal fade" id="upcoming_more">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <h6>Customer Name</h6><br> <p id="upcoming_excustomer"></p></li>
                        <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="upcoming_excontainerType"></p></li>
                        <li class="list-group-item"> <h6>Date</h6> <br> <p id="upcoming_expickupTime"></p></li>
                        <li class="list-group-item"> <h6>Container Location</h6> <br> <p id="upcoming_expickupLocation"></p></li>
                        <li class="list-group-item"> <h6>Loading Port</h6> <br> <p id="upcoming_exloadingPort"></p></li>
                        <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="upcoming_excargoType"></p> </li>
                        <li class="list-group-item"> <h6>Weight</h6> <br> <p id="upcoming_exweight"></p></li>
                        <li class="list-group-item"> <h6>Notes</h6> <br> <p id="upcoming_exnotes"></p></li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>


      
  </div>
    
</div>

  <script type="text/javascript">

    //Ongoing Hires

    var btns = document.querySelectorAll('.view-details-imports')

    btns.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #customer').innerHTML = event.target.attributes['data-customer'].value;
        document.querySelector('.modal-body #containerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #containerPickupTime').innerHTML= event.target.attributes['data-containerPickupTime'].value;
        document.querySelector('.modal-body #containerPickupLocation').innerHTML = event.target.attributes['data-containerPickupLocation'].value;
        document.querySelector('.modal-body #loadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #arrivalDate').innerHTML= event.target.attributes['data-arrivalDate'].value;
        document.querySelector('.modal-body #destination').innerHTML = event.target.attributes['data-destination'].value;
        document.querySelector('.modal-body #cargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #weight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #notes').innerHTML = event.target.attributes['data-notes'].value;
      })
    })

    var btnsExp = document.querySelectorAll('.view-details-exports')

    btnsExp.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #excustomer').innerHTML = event.target.attributes['data-customer'].value;
        document.querySelector('.modal-body #excontainerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #expickupTime').innerHTML= event.target.attributes['data-pickupTime'].value;
        document.querySelector('.modal-body #expickupLocation').innerHTML = event.target.attributes['data-pickupLocation'].value;
        document.querySelector('.modal-body #exloadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #excargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #exweight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #exnotes').innerHTML = event.target.attributes['data-notes'].value;
      })
    })


    //Upcoming Hires


    var upcoming_btns = document.querySelectorAll('.view-details-imports')

    upcoming_btns.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #upcoming_customer').innerHTML = event.target.attributes['data-customer'].value;
        document.querySelector('.modal-body #upcoming_containerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #upcoming_containerPickupTime').innerHTML= event.target.attributes['data-containerPickupTime'].value;
        document.querySelector('.modal-body #upcoming_containerPickupLocation').innerHTML = event.target.attributes['data-containerPickupLocation'].value;
        document.querySelector('.modal-body #upcoming_loadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #upcoming_arrivalDate').innerHTML= event.target.attributes['data-arrivalDate'].value;
        document.querySelector('.modal-body #upcoming_destination').innerHTML = event.target.attributes['data-destination'].value;
        document.querySelector('.modal-body #upcoming_cargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #upcoming_weight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #upcoming_notes').innerHTML = event.target.attributes['data-notes'].value;
      })
    })

    var upcoming_btnsExp = document.querySelectorAll('.view-details-exports')

    upcoming_btnsExp.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #upcoming_excustomer').innerHTML = event.target.attributes['data-customer'].value;
        document.querySelector('.modal-body #upcoming_excontainerType').innerHTML = event.target.attributes['data-containerType'].value;
        document.querySelector('.modal-body #upcoming_expickupTime').innerHTML= event.target.attributes['data-pickupTime'].value;
        document.querySelector('.modal-body #upcoming_expickupLocation').innerHTML = event.target.attributes['data-pickupLocation'].value;
        document.querySelector('.modal-body #upcoming_exloadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
        document.querySelector('.modal-body #upcoming_excargoType').innerHTML = event.target.attributes['data-cargoType'].value;
        document.querySelector('.modal-body #upcoming_exweight').innerHTML = event.target.attributes['data-weight'].value;
        document.querySelector('.modal-body #upcoming_exnotes').innerHTML = event.target.attributes['data-notes'].value;
      })
    })

  </script>
    


    