<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="styleShoprov.css">
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
            <a href="index.php" ;>หน้าหลัก &#8739;</a>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">เติมเงินเกม &#8739</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="login.php">ROV</a>
                    <a href="login.php">Freefire</a>
                </div>
            </div>
            <a href="login.php" ;>เช็คสถานะสินค้า &#8739;</a>
            <a href="https://www.facebook.com/prayutofficial" ;>เเจ้งปัญหาติดต่อ &#8739;</a>
            <a href="#" ;>ยินดีต้อนรับ ผู้เยี่ยมชม&#8739;</a>
            <a href="login.php" ;>Login &#8739;</a>

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

        <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ROV: Mobile MOBA</h1>
        <h2>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;กรุณาเลือกสินค้าที่ท่านต้องการ</h2>

    </div>

    <div class="row" style="margin-top:50px;">
        <div class="column">
            <div class="card">
                <img src="image/shells90.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: ROV<br>จำนวน&nbsp;&nbsp; : 110 คูปอง<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 90 &#128178;</p>

                    <p><button onclick="window.location.href='login.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/shells150.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: ROV<br>จำนวน&nbsp;&nbsp; : 185 คูปอง<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 150 &#128178;</p>

                    <p><button onclick="window.location.href='login.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/shells300.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: ROV<br>จำนวน&nbsp;&nbsp; : 370 คูปอง<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 300 &#128178;</p>

                    <p><button onclick="window.location.href='login.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/shells500.png" alt="Jane" style="width:100%;height:250px;">
                <div class="container">

                    <p class="title">ชื่อสินค้า: ROV<br>จำนวน&nbsp;&nbsp; : 620 คูปอง<br>ราคา&nbsp;&nbsp;&nbsp; &nbsp; : 500 &#128178;</p>

                    <p><button onclick="window.location.href='login.php'" class="button">ซื้อสินค้า</button></p>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>