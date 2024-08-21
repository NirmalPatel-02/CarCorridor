<?php
    session_start();
    include("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email=$_POST[ 'email' ];
        $pass=$_POST[ 'pass' ];

        $sql="Select * from `carcorridor`.`users` where email = '$email' AND pass ='$pass'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        $data = mysqli_fetch_assoc($result);
        if($num==1){
            $login = true;
            $_SESSION['loggedin'] = $login;
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            header("location:Main.php");
        }
        else{
            echo "<p style='color:Black;background-color:lightcoral;font-family: Arial;font-size:large;border-radius:2px;' id='msg'>Email Or Password Is Wrong</p>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="loginstyle.css">
        <title>LForm</title>
    </head>
    <body>
        <div id="RForm" class="a">
            <div id="SignUp">
                <h3>LogIn</h3>    
            </div>
            <form  id="Form" method="post">
                <label id="emailtext">Enter Email</label>
                <input type="email" name="email" id="email" class="b" placeholder="EMAIL"><br>
                <label id="passtext">Enter Password</label>
                <input type="password" name="pass" id="pass" class="b" placeholder="PASSWORD"><br>
                <a href="SignUp.php" id="gotologin">Dont Have Account? SignUp</a><br><br>
                <button id="submmit">LOGIN</button>
            </form>
        </div>
    </body>
</html>