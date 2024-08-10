<?php   
    session_start();
    $ver = $_SESSION['loggedin'];
    if($ver != true){
        header("location:CarCorridor.html");
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        header("location:CarCorridor.html");
        $_SESSION['loggedin'] = false;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CarConnect</title>
        <link rel="stylesheet" href="NevBar.css">
        <link rel="stylesheet" href="acc.css">
    </head>
    <body>
        <div id="nevbar">
            <div id="title"><h1><b style="color: red;">C</b>ar<b style="color: red;">C</b>orridor</h1></div>
            <div id="profilebox">
                <button id="Profile"></button>
                <div id="Account">
                    <label id="usernameText">USERNAME</label><br>
                    <div id="username"><?php echo $_SESSION['username']?></div><br>
                    <label id="emailText" >EMAIL</label><br>
                    <div id="email"><?php echo $_SESSION['email']?></div>
                    <form method="post"><button id="logout">LogOut</button></form>
                </div>
            </div>
            <div id="tag">
                <div id="HomeBG"><div id="Home" >Home</div></div>
                <div id="BuyBG"><div id="Buy">Buy Cars</div></div>
                <div id="SellBG"><div id="Sell">Sell Cars</div></div>
                <div id="InfoBG"><div id="Info">Cars Info.</div></div>
                <div id="ServicesBG"><div id="Services">Services</div></div>
            </div>    
        </div>
    </body>
</html>