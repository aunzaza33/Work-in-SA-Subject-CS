<?php include("server.php");
session_start();

$errors = array();

require_once('server.php');
require_once('connection.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
}
if (isset($_REQUEST['btn_insert'])) {
    try {
        $name = $_REQUEST['txt_name'];
        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        $path = "upload/" . $image_file; // set upload folder path

        if (empty($name)) {
            $errorMsg = "Please Enter name";
        } else if (empty($image_file)) {
            $errorMsg = "please Select Image";
        } else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
            if (!file_exists($path)) { // check file not exist in your upload folder path
                if ($size < 5000000) { // check file size 5MB
                    move_uploaded_file($temp, 'upload/' . $image_file); // move upload file temperory directory to your upload folder
                } else {
                    $errorMsg = "Your file too large please upload 5MB size"; // error message file size larger than 5mb
                }
            } else {
                $errorMsg = "File already exists... Check upload filder"; // error message file not exists your upload folder path
            }
        } else {
            $errorMsg = "Upload JPG, JPEG, PNG & GIF file formate...";
        }

        if (!isset($errorMsg)) {
            $insert_stmt = $db->prepare('INSERT INTO checkadmin(name, image) VALUES (:fname, :fimage)');
            $insert_stmt->bindParam(':fname', $name);
            $insert_stmt->bindParam(':fimage', $image_file);

            if ($insert_stmt->execute()) {
                $insertMsg = "File Uploaded successfully...";
                header('refresh:2;index2.php');
            }
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select_freefire90</title>
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
                <a href="FREEFIREshells90.php?logout='1'" ;>Logout &#8739;</a>
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



    <div class="row" style="margin-top:100px;">
        <div class="column">
            <div class="card">
                <img src="image/shells90.png" alt="Snow" style="width:100%">
                <div class="container">
                    <h2 style="color: white">&nbsp;&nbsp;ชื่อสินค้า : FREEFIRE</h2>
                    <h2 style="color: white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน : 135 &#128142 </h2>
                    <h2 style="color: white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ราคา : 90 บาท</h2>
                </div>
            </div>
        </div>
        <div class="column" style="margin-top: -70px; margin-left: 100px;">
            <div class="container" style="width: 500px;">
                <div class="header">
                    <h1>กรุณากรอกข้อมูลเพื่อสั่งซื้อ</h1>
                    <form action="input_db_freefire.php" method="post">
                        <input type="hidden" id="postId" name="FREEFIRE_name90" value="FREEFIRE">
                        <input type="hidden" id="postId" name="FREEFIRE_value90" value="135 เพชร">
                        <input type="hidden" id="postId" name="FREEFIRE_cost90" value="90 บาท">
                        <input type="hidden" id="postId" name="status" value="A">
                        <input type="hidden" id="postId" name="check" value="1">
                        <div class="input-group">
                            <label for="username">ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                            <input type="text" style="height: 25px; width: 300px; color: black" placeholder="username" name="idfreefire" required>
                            <br><br>


                        </div>
                        <h1 style="color: red">ช่องทางชำระเงิน</h1>
                        <h2 style="color: white">เลขบัญขี :xxx-xxxxxx</h2>
                        <h2 style="color: white">ธนาคาร :xxx</h2>
                        <h2 style="color: white">ชื่อบัญชี :xxx</h2>
                        <div class="button1">
                            <button type="submit" style="height: 65px; width: 300px; margin-left: -175px; margin-top: 50%; font-size: 30px;" name="submit900" class="btn">ตรวจสอบข้อมูล</button>
                        </div>
                    </form>
                </div>
                <div class="container text-center" style="margin-left: 90%; width: 500px;">
                    <?php
                    if (isset($errorMsg)) {
                    ?>
                        <div class="alert alert-danger" style="width: 500px;">
                            <strong><?php echo $errorMsg; ?></strong>
                        </div>
                    <?php } ?>
                    <?php
                    if (isset($insertMsg)) {
                    ?>
                        <div class="alert alert-success">
                            <strong><?php echo $insertMsg; ?></strong>
                        </div>
                    <?php } ?>
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" style="margin-top: -120px; margin-left: 100px; color:crimson">

                        <div class="form-group">
                            <div class="row">
                                <label style="font-size: 20px; margin-left: 23px;" for="name" class="col-sm-3 control-label">แนบหลักฐานการชำระเงิน</label>
                                <div>
                                    <input type="file" name="txt_file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input style="margin-left: 100px;" type="submit" name="btn_insert" class="btn btn-success" value="Insert">

                            </div>
                        </div>
                    </form>
                </div>
    </div>
    </div>
    </body>

</html>