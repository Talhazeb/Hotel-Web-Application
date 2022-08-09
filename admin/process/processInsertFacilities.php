<?php
include '../helper/connection.php';



if (isset($_POST['submit'])) {
    $code = $_POST['code_facilities'];
    $type = $_POST['type'];

    $query = "INSERT INTO tb_facilities VALUES ('$code', '$type')";
    $sql = oci_parse($con, $query);
    $r = oci_execute($sql);

    if ($r) {
?>
        <script>
            alert("Data entered successfully");
            document.location = "../formInsertFacilities.php";
        </script>
<?php
    } else {
        echo "failed";
    }
}


?>