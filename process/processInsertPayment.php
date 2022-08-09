<?php
    session_start();
    $tname = $_SESSION["NAME"];
?>

<?php
include '../helper/connection.php';

$sql = "select r.id_reservation, r.name, f.id_facilities, m.room_name, m.room_code, f.facility_type, r.stay_duration, r.total_bill
                from tb_reservation r JOIN tb_facilities f
                ON r.id_facilities = f.id_facilities
                JOIN tb_room m
                ON r.room_code = m.room_code
                where r.name = '$tname'";
                
                $query = oci_parse($con, $sql);
                $r1 = oci_execute($query);
                                
                while ($data = oci_fetch_assoc($query)){
                
                   
                    $name=$data['NAME'];
                    $id=$data['ID_RESERCATION'];
                    $room_code=$data['ROOM_CODE'];
                    $id_facilities=$data['ID_FACILITIES'];
                    $total_bill = $data['TOTAL_BILL'];

                    $query1 = "INSERT INTO tb_payment VALUES (tb_payment_seq.NEXTVAL, '$id', '$name', '$room_code', '$id_facilities', '$total_bill')";
                    $sql1 = oci_parse($con, $query1);
                    $r2 = oci_execute($sql1, OCI_COMMIT_ON_SUCCESS);
                    
                }
    
    if ($r1) 
    {
?>
    <script>
	    alert("Data entered successfully");
	    document.location="../index.php";
    </script>
<?php
    } else {
?>
    <script>
	    alert("Data failed to enter");
	    
    </script>
<?php
    }
?>

