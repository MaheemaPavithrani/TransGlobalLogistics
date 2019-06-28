
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
        <div class="col-lg-4"><a href="<?php echo base_url('admin/get_ongoing_hires')?>">
          <div class="card-counter primary">
            <i class="fa fa-clock"></i>
            <span class="count-numbers"><?php echo $ongoing_hires;?></span>
            <span class="count-name">Ongoing Hires</span>
          </div></a>
        </div>
        <div class="col-lg-4">
          <div class="card-counter danger">
            <i class="fa fa-truck"></i>
            <span class="count-numbers"><?php echo $hires_thismonth;?></span>
            <span class="count-name">Completed Hires</span>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers"><?php echo $customers_thismonth;?></span>
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
                  <td><?php echo $driver['lorry_no']; ?></td>
                  <td>
                      <a class="btn btn-primary" href="<?php echo base_url('admin/view_past_hires/'.$driver['id']);?>">View Past Hires</a>
                  </td>
                </tr>
              <?php endforeach;?>          
            </tbody>
        </table>
      </div>
      <br><br>
      <div style="padding-top:10px">
        <h2>Performance</h2>
      </div>
      <br>
      <h4 class="text-center">Imports</h4>
      <div id="graph1"></div>
      <br><br>
      <div style="padding-top:10px">
        <h4 class="text-center">Exports</h4>
      </div>
      <div id="graph2"></div>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
      <script>
        Morris.Line({
          element: 'graph1',
          data: <?php echo $graph1; ?>,
          xkey: 'im',
          ykeys: ['import_count'],
          labels: ['imports']
        });

        Morris.Line({
          element: 'graph2',
          data: <?php echo $graph2; ?>,
          xkey: 'ex',
          ykeys: ['export_count'],
          labels: ['exports']
        });
      </script>
    </div>
    
  </div>
    


    