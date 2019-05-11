<h2><?php echo $title; ?></h2>
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>License No</th>
        <th>DOB</th>
        <th>NIC</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($drivers as $driver): ?>
      <tr>
        <td><?php echo $driver['name']; ?></td>
        <td><?php echo $driver['license_no']; ?></td>
        <td><?php echo $driver['dob']; ?></td>
        <td><?php echo $driver['nic']; ?></td>
      </tr>
    <?php endforeach;?>
    </tbody>
</table>