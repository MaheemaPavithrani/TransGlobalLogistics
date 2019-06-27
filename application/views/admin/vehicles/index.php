<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
  <h2><?php echo $title; ?></h2>
  <br>
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Vehicle No</th>
          <th>Trailer No</th>
          <th>Model</th>
          <th>Driver</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($vehicles as $vehicle): ?>
        <tr>
          <td><?php echo $vehicle['lorry_no']; ?></td>
          <td><?php echo $vehicle['trailer_no']; ?></td>
          <td><?php echo $vehicle['model']; ?></td>
          <td><?php echo $vehicle['d_name']; ?></td>
          <td><button type="button" class="delete btn btn-danger"  data-toggle="modal" data-id="<?php echo $vehicle['id']; ?>" data-target="#delete">Delete</button>
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
            <input type="hidden" id="delete-action" value="<?=base_url().'admin/remove_vehicle/'?>">
            <a href="" id="remove-driver" class="btn btn-danger" role="button">Delete</a>
          </div>
        </div>
      </div>
  </div>


  <script>
    var del = document.querySelectorAll('.delete');

    del.forEach(element =>{

        element.addEventListener('click',function(event){
            var n = (document.querySelector('.modal-footer #delete-action').value + event.target.attributes['data-id'].value)
            document.querySelector('.modal-footer #remove-driver').href=n;
            
        })
    })
  </script>