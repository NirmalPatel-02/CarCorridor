<?php
    include("connection.php");
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $trade_id = $_POST['trade_id'];
        $sql ="UPDATE `carcorridor`.`trades` SET trade_status = 'Declined' where t_id = '$trade_id'";
        mysqli_query($conn,$sql);
        header("Location:trades.php");
    }
?>