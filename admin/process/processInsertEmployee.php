<?php
include '../helper/connection.php';


if(isset($_POST['submit'])){
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];    


    $query1 = "INSERT INTO tb_employees VALUE ('$emp_id', '$name', '$username', '$password','$gender','$address','$contact_no')";
    $query2 = "INSERT INTO tb_login VALUE ('$name','$username', '$password', '1' )";

    $sql1=oci_parse($con, $query1);
    $r1 = oci_execute($sql1);

    $sql2=oci_parse($con, $query2);
    $r2 = oci_execute($sql2);

    if ($r1 == 1) 
    {
        ?>
        <script >
            alert("Data entered successfully");
            document.location="../formInsertEmployee.php";
        </script>
        <?php
    } else {
        header("location:../login.php");
    }
}

oci_close($con); 

?>