<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "DELETE FROM tb_reservation WHERE id_reservation = $id";
$sql = oci_parse($con, $query);
$r = oci_execute($sql);

if ($r) {
    header("Location:../showReservation.php");
} else {
    echo "Error!";
}

oci_close($con); 

?>