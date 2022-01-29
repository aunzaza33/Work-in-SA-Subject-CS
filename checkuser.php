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
$result = mysqli_query($conn, "SELECT * FROM checkadmin");
?>
<!DOCTYPE html>
<html lang="en">

<header>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkorderadmin</title>
  <link href="test.css" rel="stylesheet" />
  <link href="stylemin.css" rel="stylesheet" />
  <link href="Dropbtn.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <header>
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
            <a href="checkuser.php?logout='1'" ;>Logout &#8739;</a>
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
    </nav>
  </header>
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

        <?php $select_stmt = $db->prepare('SELECT * FROM checkadmin');
        $select_stmt->execute();
        //$status = $_SESSION['statusorder'];
        while ($row = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php $getstatus = mysqli_query($conn, "SELECT * FROM checkadmin WHERE statusorder");
                if ($getstatus = 'A') {
                  echo "<font color='yellow'> รอจัดส่ง </font>";
                } elseif ($getstatus = 'B') {
                  echo "<font color='green'> จัดส่งเสร็จสิ้น </font>";
                } else {
                  echo "<font color='red'> จัดส่งถูกยกเลิก </font>";
                } ?></td>
            <td><?php echo $row['product'] ?></td>
            <td><?php echo $row['coupon'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['datedb'] ?></td>
            <td><a type="submit" name="txt_success" class="success" href="https://www.facebook.com/prayutofficial">contact </a>
          </tr>

        <?php endwhile; ?>
      </table>
      <meta charset="UTF-8">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>

</html>