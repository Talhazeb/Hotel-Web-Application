<?php

include "../helper/connection.php";

$query = "UPDATE tb_payment SET status = 'Paid' WHERE id_reservation='$_GET[id]' ";
$sql = oci_parse($con, $query);
$r = oci_execute($sql);

if ($r) 
{
header("location:../showPayment.php"); 
}else{
    echo "Error!";
}

oci_close($con); 

?>