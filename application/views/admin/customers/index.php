<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
  <h2><?php echo $title; ?></h2>
  <br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Name</th>
        <th>email</th>
        <th>DOB</th>
        <th>Mobile</th>
        <th>Username</th>
        <th>User Since</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($customers as $customer) : ?>
        <tr>
          <td><?php echo $customer['name']; ?></td>
          <td><?php echo $customer['email']; ?></td>
          <td><?php echo $customer['dob']; ?></td>
          <td><?php echo $customer['mobile']; ?></td>
          <td><?php echo $customer['username']; ?></td>
          <td><?php echo $customer['register_date']; ?></td>
          <td><button type="button" class="delete btn btn-danger" data-toggle="modal" data-id="<?=$customer['id'];?>" data-target="#delete">Delete</button>
            <button type="button" data-toggle="modal" data-id="<?=$customer['id'];?>" class="edit-details btn btn-primary" data-target="#edit"
                    data-name="<?php echo $customer['name']; ?>"
                    data-email="<?php echo $customer['email']; ?>"
                    data-dob="<?php echo $customer['dob']; ?>"
                    data-mobile="<?php echo $customer['mobile']; ?>"
                    data-username="<?php echo $customer['username']; ?>"
                    data-date="<?php echo $customer['register_date']; ?>"
                     >Edit
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="modal fade" id="delete">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          Are you sure you want to delete this record?
        </div>

        <div class="modal-footer">
          <input type="hidden" id="delete-action" value="<?=base_url().'admin/remove_customer/'?>">  
          <a href="http" id="remove-customer" class="btn btn-danger" role="button">Delete</a> 
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <?php echo validation_errors(); ?>
          <form action="<?=base_url().'admin/update_customer/'?>" id="edit-form" method="post" accept-charset="utf-8">
          <input type="hidden" id="form-main-action" value="<?=base_url().'admin/update_customer/'?>">

          <!-- <input type="hidden" name="id" value="<?php echo $customer['id']; ?>"> -->
          <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="" required>
          </div>
          <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" id="dob" class="form-control" name="dob" placeholder="Date of Birth" value="" required>
          </div>
          <div class="form-group">
            <label>mobile</label>
            <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile" value="" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="" required>
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
        document.querySelector('.modal-body #email').value = event.target.attributes['data-email'].value;
        document.querySelector('.modal-body #dob').value = event.target.attributes['data-dob'].value;
        document.querySelector('.modal-body #mobile').value = event.target.attributes['data-mobile'].value;
        document.querySelector('.modal-body #username').value = event.target.attributes['data-username'].value;
        document.querySelector('#edit-form').action = (document.querySelector('.modal-body #form-main-action').value + event.target.attributes['data-id'].value)   
        // console.log(document.querySelector('#edit-form').action);
           
      })
    })

    var del = document.querySelectorAll('.delete');

    del.forEach(element =>{

      element.addEventListener('click',function(event){
        var n = (document.querySelector('.modal-footer #delete-action').value + event.target.attributes['data-id'].value)
        document.querySelector('.modal-footer #remove-customer').href=n;
        
      })
      
    })
  </script>