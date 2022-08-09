<?php
include '../helper/connection.php';

$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$contact_no = $_POST["contact_no"];
$email = $_POST["email"];


$query1 = "INSERT INTO tb_guest VALUES (tb_guest_seq.NEXTVAL, '$name', '$username', '$password', '$gender', '$address', '$contact_no', '$email')";
$query2 = "INSERT INTO tb_login VALUES (tb_login_seq.NEXTVAL, '$name', '$username', '$password', '')";

$sql1 = oci_parse($con, $query1);
$r1 = oci_execute($sql1, OCI_COMMIT_ON_SUCCESS);

$sql2 = oci_parse($con, $query2);
$r2 = oci_execute($sql2, OCI_COMMIT_ON_SUCCESS);

if ($r1 == 1 && $r2 == 1) 
{
    ?>
    <script language="javascript">
        alert("Data entered successfully");
        document.location="../login.php";
    </script>
    <?php
} else {
    header("location:../login.php");
}

?>