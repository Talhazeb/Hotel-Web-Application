<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <?php
    include 'helper/connection.php';
    ?>

    <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
        <h3>Data Employee</h3>
        <hr>

        <table class="table" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from tb_employees";
                $query = oci_parse($con, $sql);
                oci_execute($query);
                $no = 1;
                while ($data = oci_fetch_assoc($query)) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['EMP_ID']; ?></td>
                        <td><?php echo $data['NAME']; ?></td>
                        <td><?php echo $data['JOB']; ?></td>
                        <td><?php echo $data['ADDRESS']; ?></td>
                        <td><?php echo $data['CONTACT_NO']; ?></td>
                        <td>
                            <?php
                            $emp_id = $data['EMP_ID'];
                            echo "<a href='process/deleteEmployee.php?id=$emp_id' class='btn btn-danger'>Delete</a>";
                            ?>
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