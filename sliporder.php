<?php
session_start();
include('server.php');
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
                    $select_stmt = $db->prepare('SELECT * FROM tbl_file'); 
                    $select_stmt->execute();

                    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>                       
                        <td><img src="upload/<?php echo $row['image']; ?>" width="300px" height="300px" alt=""></td>                                               
                    </tr>
                <?php } ?>
</body>

</html>