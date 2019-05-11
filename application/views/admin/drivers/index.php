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
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button></td>
      </tr>
    <?php endforeach;?>
    </tbody>
</table>

<div class="modal fade" id="delete">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <!-- Modal body -->
        <div class="modal-body">
          Are you sure you want to delete this record?
        </div>
   
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="<?php echo base_url('admin/remove_driver/'.$driver['id']);?>" class="btn btn-danger" role="button">Delete</a>
        </div>
        
      </div>
    </div>
  </div>