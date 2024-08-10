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
                echo "<p style='color:Black;background-color:lightgreen;font-family: Arial;font-size:large;border-radius:2px;' id='msg'>Success</p>";
                header("location:login.php");
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
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script>
        </script>
        <title>RForm</title>
    </head>
    <body>
        <div id="RForm" class="a">
            <div id="SignUp">
                <h3>Sign Up</h3>    
            </div>
            <form  id="Form" method="post">
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
                <a href="login.php" id="gotologin">Already Have Account? Login</a><br><br>
                <button id="submmit">REGISTER</button>
            </form>
        </div>
    </body>
</html>
