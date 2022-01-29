<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    $_SESSION['check'] = $_POST['status'];
    if (isset($_POST['submit900'])){ 
            $idfreefire = mysqli_real_escape_string($conn, $_POST['idfreefire']);
            

            if (empty($idfreefire)) {
                array_push($errors, "โปรดระบุไอดี");
                $_SESSION['error'] = "โปรดระบุไอดี";
            }
        
            $j = mysqli_real_escape_string($conn, $_POST['FREEFIRE_name90']);
            $k = mysqli_real_escape_string($conn, $_POST['FREEFIRE_value90']);
            $l = mysqli_real_escape_string($conn, $_POST['FREEFIRE_cost90']);

            $user_check_query = "SELECT * FROM checkadmin WHERE idgame = '$idfreefire' ";
            $query = mysqli_query($conn, $user_check_query);
            $result = mysqli_fetch_assoc($query);
          
            $user_check_query = "SELECT * FROM checkadmin WHERE product = '$j' OR coupon = '$k' OR price = '$l' ";
            $query = mysqli_query($conn, $user_check_query);
            $result = mysqli_fetch_assoc($query);

            if (count($errors) == 0) {
                $_SESSION['freefirer'] =$idfreefire;
    
                $_SESSION['FREEFIRE_name900'] =$j;
                $_SESSION['FREEFIRE_value900'] =$k;
                $_SESSION['FREEFIRE_cost900'] =$l;
                
    
                header('location: confirm2.php');
            } else {
                header("location: server.php");
            }
    }
?>