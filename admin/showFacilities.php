<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Facilities</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <?php
    include 'helper/connection.php';
    ?>

    <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
        <h3>Data Fasilitas</h3>
        <hr>

        <table class="table" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code Facilities</th>
                    <th>Facility Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from tb_facilities";
                $query = oci_parse($con, $sql);
                oci_execute($query);
                $no = 1;
                while ($data = oci_fetch_assoc($query)) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['ID_FACILITIES']; ?></td>
                        <td><?php echo $data['FACILITY_TYPE']; ?></td>
                        <td>
                            <?php
                            $id_facilities = $data['ID_FACILITIES'];
                            echo "<a href='process/deleteFacilities.php?id=$id_facilities' class='btn btn-danger'>Delete</a>";
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