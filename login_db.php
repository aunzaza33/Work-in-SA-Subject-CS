<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "รหัสผ่านเกิดข้อผิดพลาด!");
        }

        if (empty($password)) {
            array_push($errors, "รหัสผ่านเกิดข้อผิดพลาด!");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
               // $_SESSION['success'] = "";
                if($_SESSION['username'] == 'admin'){//ดักจับว่าเป็นแอดมินไหม
                    header("location: checkadmin.php");  //ถ้าใช่ให้เข้าสู่หน้าแอดมิน(ต้องแก้!)
                }
                else{
                header("location: index2.php");
                }
            } else {
                array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านเกิดข้อผิดพลาด!");
                $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านเกิดข้อผิดพลาด!";
                header("location: login.php");
            }
        } else {
            array_push($errors, "โปรดกรอกชื่อผู้ใช้เเละรหัสผ่าน");
            $_SESSION['error'] = "โปรดกรอกชื่อผู้ใช้เเละรหัสผ่าน";
            header("location: login.php");
        }
    }

?>