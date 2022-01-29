<?php
session_start();
include('server.php');
include('server1.php1');
require_once('connection.php');

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index2.php');
}
/*อัพเดทสถานะ
if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];
        $select_stmt = $db->prepare('SELECT * FROM checkadmin WHERE id = :id');
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
            $update_stmt = $db->prepare("UPDATE checkadmin SET name = :statusorder WHERE idorder = :id");
            $update_stmt->bindParam(':statusorder', $name);
            $update_stmt->bindParam(':id', $id);

            if ($update_stmt->execute()) {
                $updateMsg = "File update successfully...";
                header("refresh:2;checkadmin.php");
            }
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}*/
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

    header("Location: checktest.php");
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
    <link href="modaltest.css" rel="stylesheet" />
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
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
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
                        <a href="login.php" ;>Login &#8739;</a>
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
    $result = mysqli_query($conn, "SELECT * FROM checkadmin");
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
    <div class = "bgtable">
        <form action="checktest.php" method="post">
            <table class="column" widt="700" cellspacing="10" cellpadding="10" border="2"  border-radius='8 px' bgcolor="#800000">
                <!-- เลือกorderสินค้า -->
                <thead>
                    <tr class= "bgtable">
                        <th>ID</th>
                        <th>STATUS</th>
                        <th>Username</th>
                        <th>Product Details</th>
                        <th>Orderdata</th>
                        <th>Bill</th>
                        <th>Edit</th>
                        <th>CLOSE</th>

                    </tr>
                </thead>
                <!-- Short hand for use direct html in php -->

                <?php
                $select_stmt = $db->prepare('SELECT * FROM checkadmin');
                $select_stmt->execute();

                while ($row = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['statusorder'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['product'], '<br>', $row['coupon'], '<br>', $row['price'] ?></td>
                        <td><?php echo 'ID:', $row['emailgame'], '<br>', 'PW:', $row['passwordgame'] ?></td>
                        <td><?php echo $row['image'] ?><button id="myBtn">viewbill</button><!-- The Modal -->
                            <div id="myModal" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                        <p>bill</p>
                                </div>
                            </div></td>
                        <td><a type="submit" name="txt_success" class="success" href="checktest.php">success </a>
                            <a type="submit" name="txt_cancel" class="cancel" href="checktest.php">cancel</a>
                        </td>
                        <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Close</a></td>
                    </tr>

                <?php endwhile; ?>
            </table>
            <meta charset="UTF-8">
        </form>
    </div>

</body>

</html>