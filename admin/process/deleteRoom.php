<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "DELETE FROM tb_room WHERE room_code = $id";
$sql = oci_parse($con, $query);
$r = oci_execute($sql);

if ($r) 
{
    header("Location:../showKamar.php");
} 
else 
{
    echo "Error!";
}

oci_close($con); 

?>