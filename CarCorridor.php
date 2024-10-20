<?php 
    session_start();

    include("connection.php");

    if($_SERVER['REQUEST_METHOD']== "POST"){
        $username = $_POST[ 'username' ];
        $email    = $_POST[ 'email' ];
        $pass     = $_POST[ 'pass' ];
        $confpass = $_POST[ 'confpass' ];
        $mobile   = $_POST[ 'mobile' ];
        if($username == null || $email == null || $pass==null || $mobile== null){
            echo "<p style='color:Black;background-color:lightcoral;font-family: Arial;font-size:large;border-radius:2px;' id='msg'>Fill All Detail Is Require</p>";
        }
        else{
            if($pass == $confpass){
                $sql="INSERT INTO `carcorridor`.`users` (`id`, `username`, `email`, `mobile`, `pass`) VALUES (NULL, '$username', '$email', '$mobile', '$pass');";
                mysqli_query($conn,$sql);
            }
            else{
                echo "<p style='color:Black;background-color:lightcoral;font-family: Arial;font-size:large;border-radius:2px;' id='msg'>Password And Confirmation Password Should Be Same</p>";
            }
        }
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CarConnect</title>
        <link rel="stylesheet" href="nevigationbar.css">
        <script src="main.js"></script>
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </head>
    <body>
        <div id="nevimage">
            <div id="nevbar">
                <div id="title"><h1><b style="color: red;">C</b>ar<b style="color: red;">C</b>orridor</h1></div>
                <a><button id="Login" onclick="lvisible()">Login</button></a>
                <a><button id="SignUp" onclick="visible()">SignUp</button></a>
                <div id="tag">
                    <div id="HomeBG"><div id="Home" >Home</div></div>
                    <div id="BuyBG"><div id="Buy">Buy Cars</div>
                        <div id="buyoption">
                            <a href="ExploreNewCars.php" style="text-decoration: none;color:black;"><option id="buynewcar">Buy New Cars</option><a><hr>
                            <a style="text-decoration: none;color:black;"><option id="buyoldcar" onclick="visible()">Buy Old Cars</option></a><hr>
                            <a style="text-decoration: none;color:black;"><option id="comparecar" onclick="visible()">Compare Cars</option></a><hr>
                            <a style="text-decoration: none;color:black;"><option id="buyinghistory" onclick="visible()">Buying History</option></a>
                        </div>
                    </div>
                    <div id="SellBG"><div id="Sell">Sell Cars</div>
                    <div id="selloption">
                        <a style="text-decoration: none;color:black;"><option id="sellmycar" onclick="visible()">Seller Portal</option></a>
                    </div>
                    </div>
                    <div id="InfoBG"><div id="Info" onclick="visible()">Cars Info.</div></div>
                    <div id="ServicesBG"><div id="Services" onclick="visible()">Services</div></div>
                </div>  
                <div id="hrline"></div>     
            </div>
        </div>
        <div id="l&s">
            <div id="RForm" class="a">
                <div id="rSignUp">
                    <h3>Registration</h3>    
                </div>
                <form  id="Form" method="post" >
                    <label id="nametext">Enter Your Name</label>
                    <input type="text" name="username" id="username" class="b" placeholder="NAME"><br>
                    <label id="emailtext">Enter Email</label>
                    <input type="email" name="email" id="email" class="b" placeholder="EMAIL"><br>
                    <label id="passtext">Enter Strong Password</label>
                    <input type="password" name="pass" id="pass" class="b" placeholder="PASSWORD"><br>
                    <label id="conftext">Confirm Password</label>
                    <input type="password" name="confpass" id="confpass" class="b" placeholder="CONFIRM PASSWORD"><br>
                    <label id="mobiletext">Enter Mobile Number</label>
                    <input type="number" name="mobile" id="mobileno" class="b" placeholder="MOBILE NO."><br>
                    <a id="gotologin" onclick="lvisible()">Already Have Account? Login</a><br><br>
                    <button id="submmit" type="sybmit">REGISTER</button>
                </form>
                <button id="close" onclick="rclose()">X</button>
            </div>
            <div id="LForm" class="a">
                <div id="login">
                    <h3>LogIn</h3>    
                </div>
                <form  id="Form" method="post" action="login.php">
                    <label id="lemailtext">Enter Email</label>
                    <input type="email" name="email" id="lemail" class="b" placeholder="EMAIL"><br>
                    <label id="lpasstext">Enter Password</label>
                    <input type="password" name="pass" id="lpass" class="b" placeholder="PASSWORD"><br>
                    <a id="gotosignup" onclick="visible()">Dont Have Account? SignUp</a><br><br>
                    <button id="lsubmmit" type="submit">LOGIN</button>
                </form>
                <button id="close" onclick="lclose()">X</button>
            </div>
            
        </div>
<div class="slideshow-container" id="slideshow">

    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="home3.jpeg" style="width:100%;height:550px;">
      <div class="text">Sell Your Cars</div>
      <div class="desc"><a>Fill details and sell your cars . That will help to find customers from all over India . They can also make Trades on it</a></div>
    </div>
            
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="home2.jpg" style="width:100%;height:550px;">
      <div class="text">Information</div>
      <div class="desc"><a>View all details about any cars that help u to know and buy that car . Also u can view used cars.</a></div>
    </div>
            
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="home1.jpg" style="width:100%;height:550px;">
      <div class="text">Trades</div>
      <div class="desc"><a>Make trade on any used car and write descripton on it. that will help seller to know your intrest on car.</a></div>
    </div>
            
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
            
    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <div style="display: flex;position:relative;" id="midline">
        <div id="populercars">
            <img src="phantom.webp" id="image">
            <div id="cardetails">
                <h2>Phantom</h2>
                <h3>Rolls-Royce</h3>
                <h3>Rs 9,50,00,000</h3>
            </div>
            <div id="populercartext">
                <input style="visibility: hidden;position:absolute;" value="Populer" name="status">
                <button type="submit" style="background:transparent;border:0px black solid;color:white;width:400px;height:80px" onclick="visible()"><h2>View All Populer Cars</h2></button>
            </div>
        </div>
        <div id="trendingcars">
            <img src="urus.avif" id="image">
            <div id="cardetails">
                <h2>Urus</h2>
                <h3>Lamborghini</h3>
                <h3>Rs 4,47,00,000</h3>
            </div>
            <div id="populercartext">
                <input style="visibility: hidden;position:absolute;" value="Tranding" name="status">
                <button type="submit" style="background:transparent;border:0px black solid;color:white;width:400px;height:80px" onclick="visible()"><h2>View All Tranding Cars</h2></button>
            </div>
        </div>
        <div id="electriccars">
            <img src="tatapunch.jpg" id="image">
            <div id="cardetails">
                <h2>Tata Punch</h2>
                <h3>TATA</h3>
                <h3>Rs 10,14,000</h3>
            </div>
            <div id="populercartext">
                <input style="visibility: hidden;position:absolute;" value="Electric" name="status">
                <button type="submit" style="background:transparent;border:0px black solid;color:white;width:400px;height:80px" onclick="visible()"><h2>View All Electric Cars</h2></button>
            </div>
        </div>
    </div>
    <div id="portals">
        <div id="sellcars">
            <img src="sellcar.jpg" style="width: 600px;height:400px;">
            <div id="sellcartext">
                <h2>Sell Your Cars On Seller Portal</h2>
                <a><button id="sellcarbutton" onclick="visible()">Seller Portal</button></a>
            </div>
        </div>
        <div id="buyoldcars">
            <img src="oldcars.jpg" style="width: 600px;height:400px;">
            <div id="sellcartext">
                <h2>Buy And Make Trade On Old Cars</h2>
                <a><button id="sellcarbutton" onclick="visible()">View Old Cars</button></a>
            </div>
        </div>
    </div>
    <div id="rulestext">
        <h2>Rules</h2>
        <h3>-> Dont enter any wrong details about cars.</h3>
        <h3>-> No spam calls or message on sellers and buys mobile number.</h3>
        <h3>-> Dont enter any wrong or false images.</h3>
        <h3>-> Contect or report in case of any issue.</h3>
        <h3>-> Dont Miss use of seller information .</h3>
    </div>
    <script>
        let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
        
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
        
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
            }
            document.getElementById('RForm').style.visibility ='hidden';
            document.getElementById('LForm').style.visibility ='hidden';
            function visible(){
                document.getElementById('RForm').style.visibility ='visible';
                document.getElementById('LForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 0.5;
                document.getElementById("slideshow").style.opacity = 0.5;
                document.getElementById("midline").style.opacity = 0.5;
                document.getElementById("portals").style.opacity = 0.5;
                document.getElementById("rulestext").style.opacity = 0.5;
            }
            function lvisible(){
                document.getElementById('LForm').style.visibility ='visible';
                document.getElementById('RForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 0.5;
                document.getElementById("slideshow").style.opacity = 0.5;
                document.getElementById("midline").style.opacity = 0.5;
                document.getElementById("portals").style.opacity = 0.5;
                document.getElementById("rulestext").style.opacity = 0.5;
            }
            function rclose(){
                document.getElementById('RForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 1;
                document.getElementById("slideshow").style.opacity = 1;
                document.getElementById("midline").style.opacity = 1;
                document.getElementById("portals").style.opacity = 1;
                document.getElementById("rulestext").style.opacity = 1;
            }
            function lclose(){
                document.getElementById('LForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 1;
                document.getElementById("slideshow").style.opacity = 1;
                document.getElementById("midline").style.opacity = 1;
                document.getElementById("portals").style.opacity = 1;
                document.getElementById("rulestext").style.opacity = 1;
            }
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>
</html>