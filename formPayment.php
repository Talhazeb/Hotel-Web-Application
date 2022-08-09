<?php
    session_start();
    $username = $_SESSION["USERNAME"];
    $name = $_SESSION["NAME"];
?>
<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $room_name = $_POST['room_name'];
    $id_facilities = $_POST['facilities'];
    if($id_facilities == 'F001')
        $facility_type = 'Luxury';
    else
        $facility_type = 'Ordinary';
    $date_ci = $_POST['date_ci'];
    $date_co = $_POST['date_co'];
    $stay_duration = $_POST['stay_duration'];
    $rate = $_POST['rate'];
    $total_bill = $stay_duration * $rate;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Marriot Hotel</title>
<link rel="shortcut icon" type="image/png" href="img/mlogo1.png" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<link href="admin/css/main_page.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light content-center fixed-top" style="height : 100px">
        <div class="container">
        <a class="navbar-brand" href="profile.php"><img src="img/mlogo2.png" style="width: 20%"></a>
        <ul class="navbar-nav" style="font-size: 20px">
            <li class="nav-item">
            <a class="nav-link" href="profile.php" style="padding-right: 35px">Home</a>
            </li>
            <?php if(isset($_SESSION["NAME"])): ?>
            <li class="nav-item">
            <a class="nav-link" href="formGuestHistory.php"style="padding-right: 35px">History</a>
            </li>
            <?php else: ?>
            <?php endif ?>
            <li class="nav-item">
            <a class="nav-link" style="padding-right: 35px; color: green"><?php echo $username; ?></a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
        </div>  
        
    </nav>


        <form action="process/ProcessInsertPayment.php" method="POST">
        <div class="container">
        <h3 style="margin-top:80px;">Payment Form</h3><br>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Orderer Name</th>
                        <th>Address</th>
                        <th>Room</th>
                        <th>Facility Type</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Stay Duration</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'helper/connection.php';
                    
                $sql = "select r.id_reservation, r.name, m.room_name, f.facility_type, r.check_in_date, r.check_out_date, r.stay_duration, r.total_bill, r.address 
                from tb_reservation r JOIN tb_facilities f
                ON r.id_facilities = f.id_facilities
                JOIN tb_room m
                ON r.room_code = m.room_code
                where r.name = '$name'";
                
                $query = oci_parse($con, $sql);
                $r1 = oci_execute($query);
                $no = 1;
                
                $total_bill = 0;
                
                while ($data = oci_fetch_assoc($query)){
                ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['NAME']; ?></td>
                    <td><?php echo $data['ADDRESS']; ?></td> 
                    <td><?php echo $data['ROOM_NAME']; ?></td>
                    <td><?php echo $data['FACILITY_TYPE']; ?></td>
                    <td><?php echo $data['CHECK_IN_DATE']; ?></td>
                    <td><?php echo $data['CHECK_OUT_DATE']; ?></td>
                    <td><?php echo $data['STAY_DURATION']; ?></td>
                    <td>Rs. <?php echo $data['TOTAL_BILL']; ?></td>
                    
                    </tr>
                <?php
                
                    $total_bill += $data['TOTAL_BILL'];
                }
                
                ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="8">Total Bill</th>
                        <th>Rs. <?php echo $total_bill; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                        Total to be paid Rs. <?php echo $total_bill; ?> <br>
                            <strong>BANK: <br>1234-567-89<br> MarriotHotel</strong>
                        </p>
                    </div>
                </div>
            </div>
            <a href="process/ProcessInsertPayment.php?id=<?php echo $data['ID_RESERVATION'] ?>" class="btn btn-success">Submit</a>
        </div>
        <br><br>
        <?php
        ?>
        </form>
    <div>
    </body>
</html>