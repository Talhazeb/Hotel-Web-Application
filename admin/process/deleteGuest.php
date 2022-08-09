<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "DELETE FROM tb_guest WHERE id_guest = $id";
$sql = oci_parse($con, $query);
$r = oci_execute($sql);

if ($r) {
    header("Location:../showGuest.php");
} else {
    echo "Error!";
}

oci_close($con); 

?>