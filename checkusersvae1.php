<?php
session_start();
include('server.php');
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

$result = mysqli_query($conn, "SELECT * FROM product_db");
$result = mysqli_query($conn, "SELECT * FROM product_db");
//อัพเดทสถานะ
if (isset($_REQUEST['update_id'])) {
  try {
    $id = $_REQUEST['update_id'];
    $select_stmt = $db->prepare('SELECT * FROM product_db WHERE statusorder = :id');
    $select_stmt->bindParam(":id", $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
  } catch (PDOException $e) {
    $e->getMessage();
  }
}

if (isset($_REQUEST['btn_update'])) {
  try {

    $name = $_REQUEST['txt_name'];

    if (!isset($errorMsg)) {
      $update_stmt = $db->prepare("UPDATE product_db WHERE statusorder  = :id");
      $update_stmt->bindParam(':id', $id);

      if ($update_stmt->execute()) {
        $updateMsg = "File update successfully...";
        header("refresh:2;checkadmin.php");
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
  <title>Checkorderadmin</title>
  <link href="test.css" rel="stylesheet" />
  <link rel="stylesheet" href="bg.css">
  <link href="stylemin.css" rel="stylesheet" />
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
      <div class="container">

        <div id="navbar">
          <a href="#"> &#127918;</a>
          <a href="index2.php" ;>หน้าหลัก &#8739;</a>
          <a href="index2.php" ;>เติมเกม &#8739;</a>
          <a href="checkuser.php" ;>เช็คสถานะสินค้า &#8739;</a>
          <a href="https://www.facebook.com/IRENE.RVV.TH" ;>เเจ้งปัญหาติดต่อ &#8739;</a>
          <a href="#" ;>ยินดีต้อนรับ <?php echo $_SESSION['username']; ?>&#8739;</a>
          <a href="checkuser.php?logout='1'" ;>Logout &#8739;</a>
          <!--เช็คกด logout ให้ส่งค่า 1 คืนค่าหน้าเพื่อ destroy username-->
        </div>

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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <?php
  if (isset($errorMsg)) {
  ?>
    <div class="alert alert-danger">
      <strong><?php echo $errorMsg; ?></strong>
    </div>
  <?php } ?>

  <?php
  if (isset($updateMsg)) {
  ?>
    <div class="alert alert-success">
      <strong><?php echo $updateMsg; ?></strong>
    </div>
  <?php } ?>
  <div class="bgtable">
    <form action="checkadmin.php" method="post">
      <table class="column" widt="700" cellspacing="10" cellpadding="10" border="2" border-radius='8 px' bgcolor="#800000">
        <!-- เลือกorderสินค้า -->
        <thead>
          <tr class="bgtable">
            <th>ID</th>
            <th>STATUS</th>
            <th>Product</th>
            <th>Value</th>
            <th>Price</th>
            <th>Date</th>
            <th>Contact</th>

          </tr>
        </thead>
        <!-- Short hand for use direct html in php -->

        <?php $select_stmt = $db->prepare('SELECT * FROM product_db');
        $select_stmt->execute();

        while ($row = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['statusorder'] ?></td>
            <td><?php echo $row['product'] ?></td>
            <td><?php echo $row['coupon'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['date_db'] ?></td>
            <td><a type="submit" name="txt_success" class="success" href="https://www.facebook.com/prayutofficial">contact </a>
          </tr>

        <?php endwhile; ?>
      </table>
      <meta charset="UTF-8">
    </form>
  </div>

  </body>

</html>