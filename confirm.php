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


if (isset($_POST['confirm'])) {
    $e = $_SESSION['emailuser'];
    $p = $_SESSION['passworduser'];
    $i = $_SESSION['freefirer'];


    $nn = $_SESSION['ROV_name900'];
    $vv = $_SESSION['ROV_value900'];
    $cc = $_SESSION['ROV_cost900'];

    if (count($errors) == 0) {
        $sql = "INSERT INTO checkadmin (idgame, passgame,product, coupon ,price,statusorder,username) VALUES ('$e', '$p','$nn', '$vv' ,'$cc','$checkstatus','$uid')";
        mysqli_query($conn, $sql);
        header('location: checkuser.php');
    } else {
        header("location: server.php");
    }
}
if (isset($_POST['fix'])) {
    if (count($errors) == 0) {
        header('location: shop_rov.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm</title>
    <link href="stylemin.css" rel="stylesheet">
    <link href="styleROV.css" rel="stylesheet">
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
                <a href="index2.php" ;>???????????????????????? &#8739;</a>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">????????????????????????????????? &#8739</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="shop_rov.php">ROV</a>
                        <a href="shop_freefire.php">Freefire</a>
                    </div>
                </div>
                <a href="checkuser.php" ;>????????????????????????????????????????????? &#8739;</a>
                <a href="https://www.facebook.com/prayutofficial" ;>???????????????????????????????????????????????? &#8739;</a>
                <a href="#" ;>???????????????????????????????????? <?php echo $_SESSION['username']; ?>&#8739;</a>
                <a href="confirm.php?logout='1'" ;>Logout &#8739;</a>
                <!--?????????????????? logout ??????????????????????????? 1 ????????????????????????????????????????????? destroy username-->
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
    </nav>
    <br><br><br><br><br>

    <div class="row" style="margin-top:100px; margin-left: 28%;">
        <div class="column" style="background-color: white; width: 450px; ">
            <h1>????????????????????????????????????????????????????????????????????????????????????</h1>
        </div>
    </div>
    <div class="row" style="margin-top:20px; margin-left: 33%;">
        <div class="column" style="width: 500px; ">
            <div style="color: white; margin-left: 8.5%; font-size: 20px;"><?php

                                                                            echo '??????????????????????????????  :', $_SESSION['ROV_name900'], '<br>', '??????????????? :', $_SESSION['ROV_value900'], '<br>', '???????????? :', $_SESSION['ROV_cost900'], '<br>', '<br>';
                                                                            echo '???????????????  :', $_SESSION['emailuser'], '<br>', '???????????????????????? :', $_SESSION['passworduser'];


                                                                            ?></div>
            <h3 style="color: red">**???????????????????????????????????????????????????????????????????????????**</h2>
                <form action="#" method="post">
                    <input type="submit" name="confirm" value="????????????" style="width: 120px; height: 60px; margin-left: -35px; font-size: 35px; background-color: green">
                    <form action="#" method="post">
                        <input type="submit" name="fix" value="???????????????" style=" margin-left: 90px; margin-top: -420px; width: 120px; height: 60px; font-size: 35px; background-color: orange">
                    </form>
                </form>
        </div>
    </div>
    </div>



    </body>

</html>