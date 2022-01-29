<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เติมเงินเติมเกม</title>
  <!--css-->
  <link href="stylemin.css" rel="stylesheet">
  <link href="showSlides.css" rel="stylesheet">
  <link href="Slides.css" rel="stylesheet">
  <link href="Dropbtn.css" rel="stylesheet" />

</head>

<body>

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
            <a href="Register.php" ;>Register &#8739;</a>
            <a href="login.php" ;>Login &#8739;</a>

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


          </ul>
        </div>
      </div>
      </div>
      </div>
    </nav>
  </header>


  </div>

  <br><br><br><br>
  <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="logofreefire.png" alt="Jane" style="width:100%;height:400px;">
      <div class="text">Free Fire</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="Rovimg1.jpg" alt="Jane" style="width:100%;height:400px;">
      <div class="text">ROV</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="Rov.png" alt="Jane" style="width:100%;height:400px;">
      <div class="text">AIRI FUBUKI</div>
    </div>



  </div>
  <br>

  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>

  <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
  </script>

  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  <div class="row">
    <div class="column">
    </div>
    <div class="column">
      <img src="rovgame.jpg" alt="Snow" style="width:100%">
      <p><a href="shop_rov_nomember.php" style="color: red;">ROV</a></p>
    </div>
    <div class="column">
      <img src="freefire1.jpeg" alt="Forest" style="width:100%">
      <p><a href="shop_freefire_nomember.php" style="color: red;">FreeFire</a></p>
    </div>
    <div class="column">
      <br>
      <img src="coming_soon2.png" alt="Mountains" style="width:100%">
      <br><br>
      <p><a href="#" style="color: red;">Coming Soon</a></p>
    </div>
  </div>







</body>

</html>