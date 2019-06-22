<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
<h2><?php echo $title; ?></h2>
<br>
    <?php if(!$imports && !$exports):?>
        <h5 class="text-center">No New Hire Requests</h5>
    <?php else: ?>
        <?php if($imports): ?>
            <h2>Imports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Cargo Type</th>
                    <th>Destination</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($imports as $import): ?>
                    <tr>
                    <td><?php echo $import['c_name']; ?></td>
                    <td><?php echo $import['container_type']; ?></td>
                    <td><?php echo $import['container_pickup_datetime']; ?></td>
                    <td><?php echo $import['cargo_type']; ?></td>
                    <td><?php echo $import['destination']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('admin/view_import_request/'.$import['id']);?>">View</a>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        <?php endif; ?>
        <?php if($exports):?>
            <h2>Exports</h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>Customer</th>
                    <th>Container</th>
                    <th>Date</th>
                    <th>Pick up</th>
                    <th>Cargo Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($exports as $export): ?>
                    <tr>
                    <td><?php echo $export['c_name']; ?></td>
                    <td><?php echo $export['container_type']; ?></td>
                    <td><?php echo $export['pickup_datetime']; ?></td>
                    <td><?php echo $export['pickup_location']; ?></td>
                    <td><?php echo $export['cargo_type']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('admin/view_export_request/'.$export['id']);?>">View</a>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>

    
    



    