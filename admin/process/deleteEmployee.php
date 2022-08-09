<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "DELETE FROM tb_employees WHERE emp_id = '$id'";
$sql = oci_parse($con, $query);
$r = oci_execute($sql);

if ($r) {
    header("Location:../showEmployee.php");
} else {
    echo "error";
}


?>