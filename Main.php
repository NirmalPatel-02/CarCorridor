<?php   
    session_start();
    include("connection.php");
    $ver = $_SESSION['loggedin'];
    $email = $_SESSION['email'];
    $name = $_SESSION['username'];
    $id =$_SESSION['new'];
    if($ver != true){
        header("location:CarCorridor.php");
    }
    $sql = "SELECT * FROM `carcorridor`.`users` where id = '$id' ";
    $query = mysqli_query($conn,$sql);
    $check = mysqli_num_rows($query)>0;
    if($check){
        $row = mysqli_fetch_array($query);
    }
    $password = $row['pass'];
    $username = $row['username'];
    $newemail = $row['email'];
    $mobile = $row['mobile'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['oldpass'] != "" &&  $_POST['newpass']!=""){
            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            if($oldpass == $password){
                $newsql = "UPDATE `carcorridor`.`users` SET pass = '$newpass' where id = '$id'";
                mysqli_query($conn,$newsql);
                $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
                $query = mysqli_query($conn,$sql);
                $check = mysqli_num_rows($query)>0;
                if($check){
                    $row = mysqli_fetch_array($query);
                }
                $password = $row['pass'];
                $username = $row['username'];
                $newemail = $row['email'];
                $mobile = $row['mobile'];
            }
        }
        else if($_POST['newname']!=""){
            $namepass = $_POST['namepass'];
            $newname = $_POST['newname'];
            if($password == $namepass){
                $newsql = "UPDATE `carcorridor`.`users` SET username = '$newname' where  id = '$id'";
                mysqli_query($conn,$newsql);
                $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
                $query = mysqli_query($conn,$sql);
                $check = mysqli_num_rows($query)>0;
                if($check){
                    $row = mysqli_fetch_array($query);
                }
                $password = $row['pass'];   
                $username = $row['username'];
                $newemail = $row['email'];
                $mobile = $row['mobile'];
            }
        }
        else if($_POST['newemail']!=""){
            $newemail = $_POST['newemail'];
            $emailpass = $_POST['emailpass'];
            if($password == $emailpass){
                $newsql = "UPDATE `carcorridor`.`users` SET email = '$newemail' where  id = '$id'";
                mysqli_query($conn,$newsql);
            }
            $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
            $query = mysqli_query($conn,$sql);
            $check = mysqli_num_rows($query)>0;
            if($check){
                $row = mysqli_fetch_array($query);
            }
            $password = $row['pass'];
            $username = $row['username'];
            $newemail = $row['email'];
            $mobile = $row['mobile'];
        }
        else if($_POST['newmobile']!=""){
            $newmobile = $_POST['newmobile'];
            $mobilepass = $_POST['mobilepass'];
            if($password == $mobilepass){
                $newsql = "UPDATE `carcorridor`.`users` SET mobile = '$newmobile' where  id = '$id'";
                mysqli_query($conn,$newsql);
                $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
                $query = mysqli_query($conn,$sql);
                $check = mysqli_num_rows($query)>0;
                if($check){
                    $row = mysqli_fetch_array($query);
                }
                $password = $row['pass'];
                $username = $row['username'];
                $newemail = $row['email'];
                $mobile = $row['mobile'];
            }
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CarConnect</title>
        <link rel="stylesheet" href="mainnevbar.css">
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
            <div id="profilebox">
                <button id="Profile" onclick="visible()"></button>
                <div id="Account">
                    <label id="usernameText">USERNAME</label><br>
                    <div id="username" style="color:black;"><?php echo $username?></div>
                    <label id="emailText" >EMAIL</label>
                    <div id="email" style="color:black;"><?php echo $newemail?></div>
                    <form method="post" action="logout.php"><button id="logout">LogOut</button></form>
                </div>
            </div>
            <div id="tag">
                <a href="Main.php"><div id="HomeBG"><div id="Home" style="color:white;">Home</div></div></a>
                <div id="BuyBG"><div id="Buy">Buy Cars</div>
                    <div id="buyoption">
                        <a href="ExploreNewCars.php" style="text-decoration: none;color:black;"><option id="buynewcar">Buy New Cars</option><a><hr>
                        <a href="buyoldcars.php" style="text-decoration: none;color:black;"><option id="buyoldcar">Buy Old Cars</option></a><hr>
                        <a href="" style="text-decoration: none;color:black;"><option id="comparecar">Compare Cars</option></a><hr>
                        <a href="trade_history.php" style="text-decoration: none;color:black;"><option id="buyinghistory">Buying History</option></a>
                    </div>
                </div>
                <div id="SellBG"><div id="Sell">Sell Cars</div>
                    <div id="selloption">
                        <a href="sellmycars.php" style="text-decoration: none;color:black;"><option id="sellmycar">Seller Portal</option></a>
                    </div>
                </div>
                <div id="InfoBG"><div id="Info">Cars Info.</div></div>
                <div id="ServicesBG"><div id="Services">Services</div></div>
            </div>  
            <div id="hrline"></div> 
        </div>
    </div>
    <div id="mainprofilebox">
        <div id="info">
        <label id="profiletext">Your Username</label><br>
        <input type="text" id="profileoutput" value="<?php echo $username ?>" readonly><br>
        <button id="usernamechange" onclick="changenamebox()"></button>
        <label id="profiletext">Your Email</label><br>
        <input type="text" id="profileoutput" value="<?php echo $newemail; ?>" readonly><br>
        <button id="emailchange" onclick="changeemailbox()"></button>
        <label id="profiletext">Your Password</label><br>
        <input type="password" id="profileoutput" value="<?php echo $password ?>" readonly><br>
        <button id="passchange" onclick="changepassbox()"></button>
        <label id="profiletext">Your MobileNo.</label><br>
        <input type="text" id="profileoutput" value="<?php echo $mobile ?>" readonly><br>
        <button id="mobilechange" onclick="changemobilebox()"></button>
        </div>
        <button id="close" onclick="divclose()">X</button>
    </div>
    <div id="changepassbox">
        <form method="post">
            <input id="oldpass" name="oldpass" placeholder="OLD PASSWORD"><br><br>
            <input id="newpass" name="newpass" placeholder="NEW PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        <div id="passclose" onclick="changepassclose()">Close</div>
    </div>
    <div id="changeemailbox">
            <input id="oldpass" name="newemail" placeholder="NEW EMAIL"><br><br>
            <input id="newpass" name="emailpass" placeholder="PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        <div id="passclose" onclick="changeemailclose()">Close</div>
    </div>
    <div id="changenamebox">
            <input id="oldpass" name="newname" placeholder="NEW USERNAME"><br><br>
            <input id="newpass" name="namepass" placeholder="PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        <div id="passclose" onclick="changenameclose()">Close</div>
    </div>
    <div id="changemobilebox">
            <input id="oldpass" name="newmobile" placeholder="NEW MOBILENO."><br><br>
            <input id="newpass" name="mobilepass" placeholder="PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        </form>
        <div id="passclose" onclick="changemobileclose()">Close</div>
    </div>
    <!-- Slideshow container -->
<div class="slideshow-container">

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
<div style="display: flex;position:relative;">
    <div id="populercars">
        <img src="phantom.webp" id="image">
        <div id="cardetails">
            <h2>Phantom</h2>
            <h3>Rolls-Royce</h3>
            <h3>Rs 9,50,00,000</h3>
        </div>
        <div id="populercartext">
            <form action="onlyspecificcars.php" method="post">
            <input style="visibility: hidden;position:absolute;" value="Populer" name="status">
            <button type="submit" style="background:transparent;border:0px black solid;color:white;width:400px;height:80px"><h2>View All Populer Cars</h2></button>
            </form>
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
            <form action="onlyspecificcars.php" method="post">
            <input style="visibility: hidden;position:absolute;" value="Tranding" name="status">
            <button type="submit" style="background:transparent;border:0px black solid;color:white;width:400px;height:80px"><h2>View All Tranding Cars</h2></button>
            </form>
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
            <form action="onlyspecificcars.php" method="post">
            <input style="visibility: hidden;position:absolute;" value="Electric" name="status">
            <button type="submit" style="background:transparent;border:0px black solid;color:white;width:400px;height:80px"><h2>View All Electric Cars</h2></button>
            </form>
        </div>
    </div>
</div>
<div id="portals">
    <div id="sellcars">
        <img src="sellcar.jpg" style="width: 600px;height:400px;">
        <div id="sellcartext">
            <h2>Sell Your Cars On Seller Portal</h2>
            <a href="sellmycars.php"><button id="sellcarbutton">Seller Portal</button></a>
        </div>
    </div>
    <div id="buyoldcars">
        <img src="oldcars.jpg" style="width: 600px;height:400px;">
        <div id="sellcartext">
            <h2>Buy And Make Trade On Old Cars</h2>
            <a href="buyoldcars.php"><button id="sellcarbutton">View Old Cars</button></a>
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
        document.getElementById('mainprofilebox').style.visibility ='hidden';
        document.getElementById('changeemailbox').style.visibility ='hidden';
        document.getElementById('changenamebox').style.visibility ='hidden';
        document.getElementById('changemobilebox').style.visibility ='hidden';
        document.getElementById('changepassbox').style.visibility ='hidden';
        function visible(){
            document.getElementById('mainprofilebox').style.visibility ='visible';
        }

        function divclose(){
            document.getElementById('mainprofilebox').style.visibility ='hidden';
        }
        function changepassclose(){
            document.getElementById('changepassbox').style.visibility ='hidden';
        }
        function changepassbox(){
            document.getElementById('changepassbox').style.visibility ='visible';
        }
        function changeemailclose(){
            document.getElementById('changeemailbox').style.visibility ='hidden';
        }
        function changeemailbox(){
            document.getElementById('changeemailbox').style.visibility ='visible';
        }
        function changenameclose(){
            document.getElementById('changenamebox').style.visibility ='hidden';
        }
        function changenamebox(){
            document.getElementById('changenamebox').style.visibility ='visible';
        }
        function changemobileclose(){
            document.getElementById('changemobilebox').style.visibility ='hidden';
        }
        function changemobilebox(){
            document.getElementById('changemobilebox').style.visibility ='visible';
        }
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
    </script>
    </body>
</html>