<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
  <h2><?php echo $title; ?></h2>
  <br>
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Customer</th>
          <th>Assigned Driver</th>
          <!-- <th>Vehicle</th> -->
          <th>Container</th>
          <th>Date Completed</th>
          <th>Container Location</th>
          <th>Cargo Type</th>
          <th>Destination</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($imports as $import): ?>
        <tr>
          <td><?php echo $import['c_name']; ?></td>
          <td><?php echo $import['d_name']; ?></td>
          <td><?php echo $import['container_type']; ?></td>
          <td><?php echo $import['container_pickup_datetime']; ?></td>
          <td><?php echo $import['container_pickup_location']; ?></td>
          <td><?php echo $import['cargo_type']; ?></td>
          <td><?php echo $import['destination']; ?></td>
          <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#more">More</button>
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
              <li class="list-group-item"> <h6>Customer Name</h6><br><?php echo $import['c_name']; ?> </li>
              <li class="list-group-item"> <h6>Container Type</h6> <br> <?php echo $import['container_type']; ?></li>
              <li class="list-group-item"> <h6>Date</h6> <br> <?php echo $import['container_pickup_datetime']; ?></li>
              <li class="list-group-item"> <h6>Container Location</h6> <br> <?php echo $import['container_pickup_location']; ?></li>
              <li class="list-group-item"> <h6>Loaded Port</h6> <br> <?php echo $import['loading_port']; ?></li>
              <li class="list-group-item"> <h6>Vessel Arrival Date</h6> <br> <?php echo $import['vessel_arrival_datetime']; ?></li>
              <li class="list-group-item"> <h6>Destination</h6> <br> <?php echo $import['destination']; ?></li>
              <li class="list-group-item"> <h6>Cargo Type</h6> <br> <?php echo $import['cargo_type']; ?></li>
              <li class="list-group-item"> <h6>Weight</h6> <br> <?php echo $import['weight']; ?></li>
              <li class="list-group-item"> <h6>Notes</h6> <br> <?php echo $import['notes']; ?></li>
              <li class="list-group-item"> <h6>Driver Assigned</h6> <br> <?php echo $import['d_name']; ?></li>
              <li class="list-group-item"> <h6>Lorry Number</h6> <br></li>
            </ul>
          </div>
        </div>
      </div>
  </div>

  

    