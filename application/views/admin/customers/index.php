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
        <?php foreach($customers as $customer): ?>
          <tr>
            <td><?php echo $customer['name']; ?></td>
            <td><?php echo $customer['email']; ?></td>
            <td><?php echo $customer['dob']; ?></td>
            <td><?php echo $customer['mobile']; ?></td>
            <td><?php echo $customer['username']; ?></td>
            <td><?php echo $customer['register_date']; ?></td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                <button type="button" data-toggle="modal" data-id="5" data-name="<?php echo $customer['name']; ?>" class="edit-details btn btn-primary"  data-target="#edit">Edit</button>
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
              <a href="<?php echo base_url('admin/remove_customer/'.$customer['id']);?>" class="btn btn-danger" role="button">Delete</a>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
              <?php echo validation_errors(); ?>
              <?php echo form_open('/admin/update_customer/'.$customer['id']); ?>
                <input type="hidden" name="id" value="<?php echo $customer['id'];?>">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" id="name" class="form-control"  name="name" placeholder="Name" value="" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control"  name="email" placeholder="Email" value="<?php echo $customer['email'];?>" required>
                </div>
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date" class="form-control"  name="dob" placeholder="Date of Birth" value="<?php echo $customer['dob'];?>" required>
                </div>
                <div class="form-group">
                  <label>mobile</label>
                  <input type="text" class="form-control"  name="mobile" placeholder="Mobile" value="<?php echo $customer['mobile'];?>" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control"  name="username" placeholder="Username" value="<?php echo $customer['username'];?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
    </div>

    <script type="text/javascript">
      // $(document).ready(function () {
      //     $(document).on("click", ".edit-details", function () {
      //         var name = $(this).data('id');
      //         $('#edit').on('show.bs.modal', function (event) 
      //         {
      //             // I am confused here
      //             $("div.modal div.modal-content #name").val(name);
      //           // $.get("/products/item/"+product_id+"/", function(data)   {
      //           //     $("div.modal div.modal-content .name").append(data);
      //           // });

      //         });
      //     });
      // });    
      $(document).on("click", ".edit-details", function () {
          var name = $(this).data('id');
          $(".modal-body #name").val( name );
          // As pointed out in comments, 
          // it is unnecessary to have to manually call the modal.
          $('#edit').modal('show');
      });
    </script>

  