<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
  <h2><?php echo $title; ?></h2>
  <br>
  <table class="table">
      <thead class="thead-dark">
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
          <td><button type="button" class="delete btn btn-danger"  data-toggle="modal" data-id="<?php echo $driver['id']; ?>" data-target="#delete">Delete</button>
              <button type="button" class="edit-details btn btn-primary" data-toggle="modal" data-target="#edit" data-id="<?php echo $driver['id']; ?>"
                      data-name="<?php echo $driver['name']; ?>"
                      data-license="<?php echo $driver['license_no']; ?>"
                      data-dob="<?php echo $driver['dob']; ?>"
                      data-nic="<?php echo $driver['nic']; ?>"
                      >Edit
              </button>
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
            <input type="hidden" id="delete-action" value="<?=base_url().'admin/remove_driver/'?>">
            <a href="" id="remove-driver" class="btn btn-danger" role="button">Delete</a>
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="edit">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
            <?php echo validation_errors(); ?>
            <form action="<?=base_url().'admin/update_driver/'?>" id="edit-form" method="post" accept-charset="utf-8">
              <input type="hidden" id="form-main-action" value="<?=base_url().'admin/update_driver/'?>">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name"name="name" placeholder="Name" value="" required>
              </div>
              <div class="form-group">
                <label>License No</label>
                <input type="text" class="form-control" id="license"name="license_no" placeholder="License No" value="" required>
              </div>
              <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="" required>
              </div>
              <div class="form-group">
                <label>NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" value="" required>
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
  </div>

  <script type="text/javascript">

    var btns = document.querySelectorAll('.edit-details')

    btns.forEach(element => {

      element.addEventListener('click', function(event) {
        document.querySelector('.modal-body #name').value = event.target.attributes['data-name'].value;
        document.querySelector('.modal-body #license').value = event.target.attributes['data-license'].value;
        document.querySelector('.modal-body #dob').value = event.target.attributes['data-dob'].value;
        document.querySelector('.modal-body #nic').value = event.target.attributes['data-nic'].value;
        document.querySelector('#edit-form').action = (document.querySelector('.modal-body #form-main-action').value + event.target.attributes['data-id'].value)   
        // console.log(document.querySelector('#edit-form').action);
           
      })
    })

    var del = document.querySelectorAll('.delete');

    del.forEach(element =>{

      element.addEventListener('click',function(event){
        var n = (document.querySelector('.modal-footer #delete-action').value + event.target.attributes['data-id'].value)
        document.querySelector('.modal-footer #remove-driver').href=n;
        
      })
      
    })
  </script>

    