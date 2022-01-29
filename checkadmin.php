<?php
session_start();
include('server.php');
include('server1.php');
require_once('connection.php');

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index2.php');
}
//ลบไอดี
if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stmt = $db->prepare('SELECT * FROM checkadmin WHERE id = :id');
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("upload/" . $row['image']); // unlin functoin permanently remove your file

    // delete an original record from db
    $delete_stmt = $db->prepare('DELETE FROM checkadmin WHERE id = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header("Location: checkadmin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkorderadmin</title>
    <link href="test.css" rel="stylesheet" />
    <link href="stylemin.css" rel="stylesheet" />
    <link href="modaltest.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script>
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
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navigation">
            <div class="container">

                <nav>
                    <div id="navbar">
                        <a href="#"> &#127918;</a>
                        <a href="#" ;>ระบบส่งสินค้า &#8739;</a>
                        <a href="index2.php?logout='1'" ;>Logout &#8739;</a>

                    </div>
                </nav>
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
    $result = mysqli_query($conn, "SELECT * FROM checkadmin ");
    ?>
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
    <form action="checkadmin.php" method="post">
        <table class="column" widt="700" cellspacing="10" cellpadding="10" border="2" border-radius='8 px' bgcolor="#800000">
            <!-- เลือกorderสินค้า -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>STATUS</th>
                    <th>Username</th>
                    <th>Product Details</th>
                    <th>Orderdata</th>
                    <th>Edit</th>
                    <th>Bill</th>
                    <th>CLOSE</th>

                </tr>
            </thead>
            <!-- Short hand for use direct html in php -->

            <?php
            $select_stmt = $db->prepare('SELECT * FROM checkadmin');
            $select_stmt->execute();
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <div>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php $getstatus = mysqli_query($conn, "SELECT * FROM checkadmin");
                            if ($getstatus = 'A') {
                                echo "<font color='yellow'> รอชำระเงิน </font>";
                            } else {
                                echo "<font color='red'> ชำระเงินไม่สำเร็จ </font>";
                            } ?>
                        </td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['product'], '<br>', $row['coupon'], '<br>', $row['price'] ?></td>
                        <td><?php echo 'ID:', $row['idgame'], '<br>', 'PW:', $row['passgame'] ?></td>
                        <td>
                            <div class="col-sm-12">
                                <input type="submit" name="btn_update" class="btn btn-primary" value="จัดส่งสำเร็จ">
                                <a href="checkadmin.php" class="btn btn-danger">จัดส่งถูกยกเลิก</a>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <img id="myImg" src="bill.jpg" alt="Bill" style="width:100%;max-width:100px">
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <span class="close">&times;</span>
                                            <img class="modal-content" id="img01">
                                            <div id="caption"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                        <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Close</a></td>
                    </tr>
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById("myImg");
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    img.onclick = function() {
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                    }

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                </script>
            <?php endwhile; ?>
        </table>
        <meta charset="UTF-8">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>