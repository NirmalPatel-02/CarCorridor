<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    header("location:CarCorridor.html");
    $_SESSION['loggedin'] = false;
}
?>