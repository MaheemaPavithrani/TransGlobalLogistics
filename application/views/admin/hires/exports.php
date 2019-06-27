<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
  <h2><?php echo $title; ?></h2>
  <br>
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Customer</th>
          <th>Assigned Driver</th>
          <th>Vehicle</th>
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
                      data-driver = "<?php echo $export['d_name']; ?>"
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
              <li class="list-group-item"> <h6>Customer Name</h6><br> <p id="customer"></li>
              <li class="list-group-item"> <h6>Container Type</h6> <br> <p id="containerType"></p></li>
              <li class="list-group-item"> <h6>Date</h6> <br> <p id="pickupTime"></p></li>
              <li class="list-group-item"> <h6>Container Location</h6> <br> <p id="pickupLocation"></p></li>
              <li class="list-group-item"> <h6>Loading Port</h6> <br> <p id="loadingPort"></p></li>
              <li class="list-group-item"> <h6>Cargo Type</h6> <br> <p id="cargoType"></p> </li>
              <li class="list-group-item"> <h6>Weight</h6> <br> <p id="weight"></p></li>
              <li class="list-group-item"> <h6>Notes</h6> <br> <p id="notes"></p></li>
              <li class="list-group-item"> <h6>Driver Assigned</h6> <br> <p id="driver"></p></li>
              <li class="list-group-item"> <h6>Lorry Number</h6> <br><p id="lorry"></p></li>
            </ul>
          </div>
        </div>
      </div>
  </div>

  <script>
    var btnsExp = document.querySelectorAll('.view-details-exports')

    btnsExp.forEach(element => {

      element.addEventListener('click', function(event) {
          document.querySelector('.modal-body #customer').innerHTML = event.target.attributes['data-customer'].value;
          document.querySelector('.modal-body #containerType').innerHTML = event.target.attributes['data-containerType'].value;
          document.querySelector('.modal-body #pickupTime').innerHTML= event.target.attributes['data-pickupTime'].value;
          document.querySelector('.modal-body #pickupLocation').innerHTML = event.target.attributes['data-pickupLocation'].value;
          document.querySelector('.modal-body #loadingPort').innerHTML = event.target.attributes['data-loadingPort'].value;
          document.querySelector('.modal-body #cargoType').innerHTML = event.target.attributes['data-cargoType'].value;
          document.querySelector('.modal-body #weight').innerHTML = event.target.attributes['data-weight'].value;
          document.querySelector('.modal-body #notes').innerHTML = event.target.attributes['data-notes'].value;
          document.querySelector('.modal-body #driver').innerHTML = event.target.attributes['data-driver'].value;
          document.querySelector('.modal-body #lorry').innerHTML = event.target.attributes['data-lorry'].value;
      })
    })

    </script>

    