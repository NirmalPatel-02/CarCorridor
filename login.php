<?php
    session_start();
    include("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $Name=$_POST[ 'Name' ];
        $Pass=$_POST[ 'Pass' ];

        $sql="Select * from `carsignup`.`data` where Name = '$Name' AND Pass ='$Pass'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            $login = true;
            $_SESSION['loggedin'] = $login;
            $_SESSION['username'] = $Name;
            header("location:Main.php");
        }
        else{
            echo"fali";
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
        <div id="RForm">
            <div id="Title">
                <h3>Login</h3>
            </div>
            <form  id="Form" method="post">
                <input type="text" name="Name" id="Name" placeholder="USERNAME"><br><br>
                <input type="password" name="Pass" id="Pass" placeholder="PASSWORD"><br><br>
                <button id="Submmit">LogIn</button>
            </form>
        </div>
    </body>
</html>