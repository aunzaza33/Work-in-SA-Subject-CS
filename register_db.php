<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($username)) {
            array_push($errors, "โปรดระบุชื่อ");
            $_SESSION['error'] = "โปรดระบุชื่อ";
        }
        if (empty($email)) {
            array_push($errors, "โปรดระบุอีเมล");
            $_SESSION['error'] = "โปรดระบุอีเมล";
        }
        if (empty($password_1)) {
            array_push($errors, "โปรดระบุรหัสผ่าน");
            $_SESSION['error'] = "โปรดระบุรหัสผ่าน";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "รหัสผ่านทั้งสองไม่ตรงกัน");
            $_SESSION['error'] = "รหัสผ่านทั้งสองไม่ตรงกัน";
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "ชื่อนี้ถูกใช้ไปแล้ว");
            }
            
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            header('location: index.php');
        } else {
            header("location: register.php");
        }
    }

?>