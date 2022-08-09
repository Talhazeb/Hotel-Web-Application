<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Room</title>
    <link rel="shortcut icon" type="image/png" href="img/mlogo1.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <?php
    include 'helper/connection.php';
    ?>

    <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
        <h3>Data Room</h3>
        <hr>

        <table class="table" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Room Code</th>
                    <th>Room Type</th>
                    <th>Class</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from tb_room";
                $query = oci_parse($con, $sql);
                oci_execute($query);
                $no = 1;
                while ($data = oci_fetch_assoc($query)) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['ROOM_CODE']; ?></td>
                        <td><?php echo $data['ROOM_NAME']; ?></td>
                        <td><?php echo $data['CLASS']; ?></td>
                        <td><?php echo $data['RATE']; ?></td>
                        <td><?php echo $data['STATUS']; ?></td>
                        <td>

                            <a href="process/deleteRoom.php?id=<?php echo $data['ROOM_CODE'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>


                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>