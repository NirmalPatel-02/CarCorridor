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
        <link rel="stylesheet" href="Nevbar.css">
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
                            <a href="buyoldcars.php" style="text-decoration: none;color:black;"><option id="buyoldcar">Buy Old Cars</option></a><hr>
                            <a href="" style="text-decoration: none;color:black;"><option id="comparecar">Compare Cars</option></a><hr>
                            <a href="" style="text-decoration: none;color:black;"><option id="buyinghistory">Buying History</option></a>
                        </div>
                    </div>
                    <div id="SellBG"><div id="Sell">Sell Cars</div>
                        <div id="selloption">
                            <a href="sellmycars.php" style="text-decoration: none;color:black;"><option id="sellmycar">Sell My Car</option></a><hr>
                            <a href="" style="text-decoration: none;color:black;"><option id="sellinghistory">Selling History</option></a>
                        </div>
                    </div>
                    <div id="InfoBG"><div id="Info">Cars Info.</div></div>
                    <div id="ServicesBG"><div id="Services">Services</div></div>
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
        <script>
            document.getElementById('RForm').style.visibility ='hidden';
            document.getElementById('LForm').style.visibility ='hidden';
            function visible(){
                document.getElementById('RForm').style.visibility ='visible';
                document.getElementById('LForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 0.5;
            }
            function lvisible(){
                document.getElementById('LForm').style.visibility ='visible';
                document.getElementById('RForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 0.5;
            }
            function rclose(){
                document.getElementById('RForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 1;
            }
            function lclose(){
                document.getElementById('LForm').style.visibility ='hidden';
                document.getElementById("nevbar").style.opacity = 1;
            }
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>
</html>