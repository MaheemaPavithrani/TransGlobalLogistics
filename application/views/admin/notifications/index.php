<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 my-4">
<h2><?php echo $title; ?></h2>
<br>
    <?php if(!$notifications):?>
        <h5 class="text-center">No New Notifications</h5>
    <?php else: ?>
            <h2>New Notifications</h2>
            <br>
            <table class="table">
                <tbody>
                <?php foreach($notifications as $note): ?>

                    <?php if($note['title'] == 'New Hire Request'): ?>
                        <tr>
                        <td><?php echo $note['title']; ?> : <?php echo $note['hire_type']; ?></td>
                        <td> <a class="btn btn-primary" href="<?php echo base_url('admin/read_notification/hire_request/'.$note['id']);?>">View</a>
                        </td>
                        </tr>
                    <?php elseif($note['title'] == 'Hire Completed'): ?> 
                        <tr>
                        <td><?php echo $note['title']; ?> : <?php echo $note['message']; ?></td>
                        <td> <a class="btn btn-primary" href="<?php echo base_url('admin/read_notification/hire_complete/'.$note['id']);?>">View</a>
                        </td>
                        </tr>
                    <?php else: ?>  

                    <?php endif;?>
                <?php endforeach;?>
                </tbody>
            </table>
    <?php endif; ?>

    
    



    