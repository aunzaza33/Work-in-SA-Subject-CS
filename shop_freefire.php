<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="styleShopfreefire.css">
    <link href="Dropbtn.css" rel="stylesheet" />
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

    <nav>
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
            <a href="shop_freefire.php?logout='1'" ;>Logout &#8739;</a>

        </div>
    </nav>
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

    <div style="margin-top:100px;">

        <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FREE FIRE</h1>
        <h2>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;กรุณาเลือกสินค้าที่ท่านต้องการ</h2>

    </div>

    <div class="row" style="margin-top:50px;">
        <div class="column">
            <div class="card">
                <img src="image/shells90.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: FREE FIRE<br>จำนวน&nbsp;&nbsp; : 135 &#128142;<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 90 &nbsp;&nbsp; &#128178;</p>

                    <p><button onclick="window.location.href='FREEFIREshells90.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/shells150.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: FREE FIRE<br>จำนวน&nbsp;&nbsp; : 517 &#128142;<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 150 &nbsp;&#128178;</p>

                    <p><button onclick="window.location.href='FREEFIREshells150.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/shells300.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: FREE FIRE<br>จำนวน&nbsp;&nbsp; : 1052 &#128142;<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 300 &nbsp;&nbsp; &#128178;</p>

                    <p><button onclick="window.location.href='FREEFIREshells300.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/shells500.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: FREE FIRE<br>จำนวน&nbsp;&nbsp; : 1800 &#128142;<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 500&nbsp;&nbsp;&nbsp; &#128178;</p>

                    <p><button onclick="window.location.href='FREEFIREshells500.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>
    </div>

    <div>
</body>

</html>