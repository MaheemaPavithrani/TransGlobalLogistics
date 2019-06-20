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
          <th>Pick up</th>
          <th>Cargo Type</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($exports as $export): ?>
        <tr>
          <td><?php echo $export['c_name']; ?></td>
          <td><?php echo $export['d_name']; ?></td>
          <td><?php echo $export['container_type']; ?></td>
          <td><?php echo $export['pickup_datetime']; ?></td>
          <td><?php echo $export['pickup_location']; ?></td>
          <td><?php echo $export['cargo_type']; ?></td>
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
              <li class="list-group-item"> <h6>Customer Name</h6><br><?php echo $export['c_name']; ?> </li>
              <li class="list-group-item"> <h6>Container Type</h6> <br> <?php echo $export['container_type']; ?></li>
              <li class="list-group-item"> <h6>Date</h6> <br> <?php echo $export['pickup_datetime']; ?></li>
              <li class="list-group-item"> <h6>Container Location</h6> <br> <?php echo $export['pickup_location']; ?></li>
              <li class="list-group-item"> <h6>Loaded Port</h6> <br> <?php echo $export['loading_port']; ?></li>
              <li class="list-group-item"> <h6>Cargo Type</h6> <br> <?php echo $export['cargo_type']; ?></li>
              <li class="list-group-item"> <h6>Weight</h6> <br> <?php echo $export['weight']; ?></li>
              <li class="list-group-item"> <h6>Notes</h6> <br> <?php echo $export['notes']; ?></li>
              <li class="list-group-item"> <h6>Driver Assigned</h6> <br> <?php echo $export['d_name']; ?></li>
              <li class="list-group-item"> <h6>Lorry Number</h6> <br></li>
            </ul>
          </div>
        </div>
      </div>
  </div>

    