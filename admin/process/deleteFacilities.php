<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "DELETE FROM tb_facilities WHERE id_facilities = '$id'";
$sql = oci_parse($con, $query);
$r = oci_execute($sql);

if ($r) {
    header("Location:../showFacilities.php");
} else {
    echo "Error";
}

oci_close($con); 

?>