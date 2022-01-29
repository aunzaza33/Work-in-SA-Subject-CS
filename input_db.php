<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    $_SESSION['check'] = $_POST['status'];
    if (isset($_POST['submit90'])){ 
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            if (empty($email)) {
                array_push($errors, "โปรดระบุอีเมล");
                $_SESSION['error'] = "โปรดระบุอีเมล";
            }
            if (empty($password)) {
                array_push($errors, "โปรดระบุรหัสผ่าน");
                $_SESSION['error'] = "โปรดระบุรหัสผ่าน";
            }
            $n = mysqli_real_escape_string($conn, $_POST['ROV_name90']);
            $v = mysqli_real_escape_string($conn, $_POST['ROV_value90']);
            $c = mysqli_real_escape_string($conn, $_POST['ROV_cost90']);

            $user_check_query = "SELECT * FROM checkadmin WHERE passgame = '$password' OR idgame = '$email' ";
            $query = mysqli_query($conn, $user_check_query);
            $result = mysqli_fetch_assoc($query);
          
            $user_check_query2 = "SELECT * FROM checkadmin WHERE product = '$n' OR coupon = '$v' OR price = '$c' ";
            $query2 = mysqli_query($conn, $user_check_query2);
            $result2 = mysqli_fetch_assoc($query2);

            if (count($errors) == 0) {
                $_SESSION['emailuser'] =$email;
                $_SESSION['passworduser'] =$password;
    
                $_SESSION['ROV_name900'] =$n;
                $_SESSION['ROV_value900'] =$v;
                $_SESSION['ROV_cost900'] =$c;
                
    
                header('location: confirm.php');
            } else {
                header("location: server.php");
            }

        }
       

    