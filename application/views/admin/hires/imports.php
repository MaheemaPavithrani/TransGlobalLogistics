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
              <button type="button" class="view-details-imports btn btn-primary" data-toggle="modal" data-target="#more"
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
                      data-driver = "<?php echo $import['d_name']; ?>"
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
              <li class="list-group-item"> <h6>Driver Assigned</h6> <br> <p id="driver"></p></li>
              <li class="list-group-item"> <h6>Lorry Number</h6> <br></li>
            </ul>
          </div>
        </div>
      </div>
  </div>


  <script type="text/javascript">

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
        document.querySelector('.modal-body #driver').innerHTML = event.target.attributes['data-driver'].value;
        // document.querySelector('#edit-form').action = (document.querySelector('.modal-body #form-main-action').value + event.target.attributes['data-id'].value)   
        // console.log(document.querySelector('#edit-form').action);
           
      })
    })

  </script>

  

    