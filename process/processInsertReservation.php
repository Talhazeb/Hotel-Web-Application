<?php
include '../helper/connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $room_code = $_POST['room_name'];
    $id_facilities = $_POST['facilities'];
    if($id_facilities == 'F001')
        $facility_type = 'Luxury';
    else
        $facility_type = 'Ordinary';
    $date_ci = $_POST['date_ci'];
    $date_co = $_POST['date_co'];
    $stay_duration = $_POST['stay_duration'];
    $rate = $_POST['rate'];
    $total_bill = $stay_duration * $rate;


    $query = "INSERT INTO tb_reservation VALUES (tb_reservation_seq.NEXTVAL, '$name', '$room_code', '$id_facilities', TO_DATE('$date_ci', 'yyyy-MM-dd'),TO_DATE('$date_co', 'yyyy-MM-dd'), '$facility_type', '$stay_duration', '$total_bill', '$address')";
    $sql = oci_parse($con, $query);
    $r = oci_execute($sql, OCI_COMMIT_ON_SUCCESS);
    
    if ($r == 1) 
    {
?>
        <script >
            alert("Data entered successfully");
            document.location = "../formPayment.php";
        </script>
    <?php
    } 
    else 
    {
    ?>
        <script>
            alert("Data failed to enter");
        </script>
<?php
    }
}
?>
