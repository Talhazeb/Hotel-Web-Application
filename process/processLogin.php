<?php
    include('../helper/connection.php');
    session_start();
    $error = '';

    if(isset($_POST["submit"])){
        if(!empty($_POST["username"]) || !empty($_POST["password"])) 
        {
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            
            $db_sid =
                "(DESCRIPTION =
                (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl))
                )";            

            $db_user = "scott";
            $db_pass = "1234";

            $con = oci_connect($db_user, $db_pass, $db_sid);

            if(!$con) {
                die("Connection failed : " .oci_error());
            }

            $query = "SELECT * FROM tb_login WHERE username='$username' AND password='$password'";
            $result = oci_parse($con, $query);
            $r = oci_execute($result);
            
            $row = oci_fetch_array($result);
            
            if(oci_num_rows($result) == 1) 
            {
                $_SESSION["ACCOUNT_ID"] = $row["ID"];
                $_SESSION["NAME"] = $row["NAME"];
                $_SESSION["USERNAME"] = $row["USERNAME"]; 
                $_SESSION["ADMIN_LEVEL"] = $row["ADMIN_LEVEL"];
                
                if($_SESSION["ADMIN_LEVEL"] == "1") 
                { 
                    header("location:../admin/admin.php"); 
                }
                else
                { 
                    header("location:../profile.php"); 
                }
                
            } else {
                ?>
        <script>
            alert("Invalid Credentials!");
            document.location = "../login.php";
        </script>
<?php
        }
    }
}
?>