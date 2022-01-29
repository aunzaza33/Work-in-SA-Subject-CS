<?php include("server.php");
session_start();

$errors = array();
$checkstatus = $_SESSION['check'];
$uid = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
}
$checkfreefire = $_SESSION['check'];

if (isset($_POST['confirm'])) {
    $i = $_SESSION['freefirer'];


    $zz = $_SESSION['FREEFIRE_name900'];
    $xx = $_SESSION['FREEFIRE_value900'];
    $aa = $_SESSION['FREEFIRE_cost900'];

    if (count($errors) == 0) {
        $sql = "INSERT INTO checkadmin (product,coupon,price,idgame,statusorder,username) VALUES ('$zz', '$xx' , '$aa','$i','$checkstatus','$uid')";
        mysqli_query($conn, $sql);

        header('location: checkuser.php');
    } else {
        header("location: server.php");
    }
}
if (isset($_POST['fix'])) {
    if (count($errors) == 0) {
        header('location: shop_freefire.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm</title>
    <link href="stylemin.css" rel="stylesheet" />
    <link href="styleROV.css" rel="stylesheet" />
    <link href="Dropbtn.css" rel="stylesheet" />
    <script>
        // When the user scrolls down 20px from the top of the document, slide down the navbar
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-50px";
            }
        }
    </script>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navigation">

            <div id="navbar">
                <a href="#"> &#127918;</a>
                <a href="index2.php" ;>หน้าหลัก &#8739;</a>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">เติมเงินเกม &#8739</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="shop_rov.php">ROV</a>
                        <a href="shop_freefire.php">Freefire</a>
                    </div>
                </div>
                <a href="checkuser.php" ;>เช็คสถานะสินค้า &#8739;</a>
                <a href="https://www.facebook.com/prayutofficial" ;>เเจ้งปัญหาติดต่อ &#8739;</a>
                <a href="#" ;>ยินดีต้อนรับ <?php echo $_SESSION['username']; ?>&#8739;</a>
                <a href="confirm2.php?logout='1'" ;>Logout &#8739;</a>
                <!--เช็คกด logout ให้ส่งค่า 1 คืนค่าหน้าเพื่อ destroy username-->
            </div>
            <script>
            /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
            function myFunction() {
              document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
          </script>

            <!--  notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            <!-- logged in user information -->
            <?php if (isset($_SESSION['username'])) : ?>
            <?php endif ?>
        </div>

        </ul>
        </div>
        </div>
        </div>
        </div>
    </nav>
    <div class="row" style="margin-top:100px; margin-left: 28%;">
        <div class="column" style="background-color: white; width: 450px; ">
            <h1>ตรวจสอบข้อมูลก่อนการสั่งซื้อ</h1>
        </div>
    </div>
    <div class="row" style="margin-top:20px; margin-left: 33%;">
        <div class="column" style="width: 500px; ">
            <div style="color: white; margin-left: 8.5%; font-size: 20px;"><?php

                                                                            echo 'ชื่อสินค้า  :', $_SESSION['FREEFIRE_name900'], '<br>', 'จำนวน :', $_SESSION['FREEFIRE_value900'], '<br>', 'ราคา :', $_SESSION['FREEFIRE_cost900'], '<br>', '<br>';
                                                                            echo 'ไอดี  :', $_SESSION['freefirer'];

                                                                            ?></div>
            <h3 style="color: red">**หากข้อมูลถูกต้องให้กดตกลง**</h2>
                <form action="#" method="post">
                    <input type="submit" name="confirm" value="ตกลง" style="width: 120px; height: 60px; margin-left: -35px; font-size: 35px; background-color: green">
                    <form action="#" method="post">
                        <input type="submit" name="fix" value="แก้ไข" style=" margin-left: 90px; margin-top: -420px; width: 120px; height: 60px; font-size: 35px; background-color: orange">
                    </form>
                </form>
        </div>
    </div>
    </div>



    </body>

</html>