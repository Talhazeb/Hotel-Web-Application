<?php
    $db_sid =
            "(DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
            (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl))
            )";            

            $db_user = "system";  
            $db_pass = "1234"; 

            $con = oci_connect($db_user, $db_pass, $db_sid);
?>