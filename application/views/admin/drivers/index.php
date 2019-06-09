<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
  <h2><?php echo $title; ?></h2>
  <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>License No</th>
          <th>DOB</th>
          <th>NIC</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($drivers as $driver): ?>
        <tr>
          <td><?php echo $driver['name']; ?></td>
          <td><?php echo $driver['license_no']; ?></td>
          <td><?php echo $driver['dob']; ?></td>
          <td><?php echo $driver['nic']; ?></td>
          <!-- <td><?php echo $driver['username']; ?></td> -->
          <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
          </td>
        </tr>
      <?php endforeach;?>
      </tbody>
  </table>

  <div class="modal fade" id="delete">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
            Are you sure you want to delete this record?
          </div>

          <div class="modal-footer">
            <a href="<?php echo base_url('admin/remove_driver/'.$driver['id']);?>" class="btn btn-danger" role="button">Delete</a>
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="edit">
      <div class="modal-dialog">
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
      </div>
  </div>

    