<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Payment</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<?php
    include 'helper/connection.php';
?>

<div class="container" style="padding-top: 20px; padding-bottom: 20px;">
    <h3>Data Payment</h3>
<hr>

<table class="table" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Payment ID</th>
            <th>Room Code</th>
            <th>Facilities ID</th>
            <th>Total Bill</th>
            <th>Status</th>
            <th>Action</th>                  
        </tr>
    </thead>  
    <tbody>
    <?php
        $no=1;

        $sql = "SELECT * FROM tb_payment";
        $query = oci_parse($con, $sql);
        oci_execute($query);
        while($data = oci_fetch_assoc($query)){
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['NAME']; ?></td>
            <td><?php echo $data['ROOM_CODE']; ?></td>
            <td><?php echo $data['ID_FACILITIES']; ?></td>
            <td>Rs. <?php echo $data['TOTAL_BILL']; ?></td>
            <td><?php echo $data['STATUS']; ?></td>
            <td>
                <a href="process/processPayment.php?id=<?php echo $data['ID_RESERVATION'] ?>" class="btn btn-success">Confirm</a>
            </td>
            
        </tr>
        <?php $no++; ?>
        <?php } ?>
    </tbody>
</table>