<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    header("location:CarCorridor.php");
    $_SESSION['loggedin'] = false;
}
?>