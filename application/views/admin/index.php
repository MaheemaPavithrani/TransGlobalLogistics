
<!-- <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1><?php echo $title; ?></h1>      
  </div>
</div>
<div class="row">
  <div class="col">col-3</div>
  <div class="col-6">col-6</div>
  <div class="col">col-3</div>
</div> -->
    <div class="col-lg-10 col-lg-10">
      <div style="padding-top:10px">
        <h2>This Month</h2>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="card-counter primary">
            <i class="fa fa-clock"></i>
            <span class="count-numbers">12</span>
            <span class="count-name">Pending Hires</span>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-counter danger">
            <i class="fa fa-truck"></i>
            <span class="count-numbers">23</span>
            <span class="count-name">Completed Hires</span>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers">35</span>
            <span class="count-name">New Customers</span>
          </div>
        </div>
      </div> 
      <br>
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
                  <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Remove from List</button>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view">View Past Hires</button>
                  </td>
                </tr>
              <?php endforeach;?>          
            </tbody>
        </table>
      </div>
    </div>
    <div class="modal fade" id="delete">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
            Are you sure you want to Remove this record?
          </div>

          <div class="modal-footer">
            <a href="" class="btn btn-danger" role="button">Remove</a>
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="edit">
      <!-- <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
            <?php echo validation_errors(); ?>
            <?php echo form_open('/admin/update_driver/'.$driver['id']); ?>
              <input type="hidden" name="id" value="<?php echo $driver['id'];?>">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"  name="name" placeholder="Name" value="<?php echo $driver['name'];?>" required>
              </div>
              <div class="form-group">
                <label>License No</label>
                <input type="text" class="form-control"  name="license_no" placeholder="License No" value="<?php echo $driver['license_no'];?>" required>
              </div>
              <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" class="form-control"  name="dob" placeholder="Date of Birth" value="<?php echo $driver['dob'];?>" required>
              </div>
              <div class="form-group">
                <label>NIC</label>
                <input type="text" class="form-control"  name="nic" placeholder="NIC" value="<?php echo $driver['nic'];?>" required>
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div> -->
  </div>
    


    