<?php
    session_start();
    include("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email=$_POST[ 'email' ];
        $pass=$_POST[ 'pass' ];

        $sql="Select * from `carcorridor`.`users` where email = '$email' AND pass ='$pass'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        $data = mysqli_fetch_array($result);
        $_SESSION['new']= $data['id'];
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